<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Depot;
use App\Entity\Compte;
use App\Entity\Role;
use App\Entity\Partenaire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


/**
 * @Route("/api")
 */
class CompteController extends AbstractController
{
    private $tokenStorage;
    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @Route("/newpartcompte", name="creation_compte_NewPartenaire", methods={"POST"})
     */
    public function compteNew_Partenaire(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $values = json_decode($request->getContent());
        if(isset($values->username,$values->password,$values->ninea,$values->solde))
        {
            $deposedAt = new \Datetime; 
            $createdAt = new \DateTime();
            $depot = new Depot();
            $compte = new Compte();                     
            $user = new User();
            $partenaire = new Partenaire();                                                             
            // AFFECTATION DES VALEURS AUX DIFFERENTS TABLE
                    #####   USER    ######
            $roleRepo = $this->getDoctrine()->getRepository(Role::class);
            $role = $roleRepo->find($values->role);
            $user->setIsActive($values->isActive);
            $user->setEmail($values->email);
            $user->setUsername($values->username);
            $user->setPassword($userPasswordEncoder->encodePassword($user, $values->password));
            $user->setPartenaire($partenaire);
            $user->setRole($role);
            $entityManager->persist($user);

            $partenaire->setNinea($values->ninea);
            $partenaire->setRc($values->rc);
            $partenaire->setTelephone($values->telephone);
            $entityManager->persist($partenaire);
            $entityManager->flush();

            ####    GENERATION DU NUMERO DE COMPTE  ####
            $annee = Date('y');
            $cpt = $this->getLastCompte();
            $long = strlen($cpt);
            $ninea2 = substr($partenaire->getNinea() , -2);
            $numCompte = str_pad("SN".$annee.$ninea2, 11-$long, "0").$cpt;
                    #####   COMPTE    ######
            // recuperer de l'utilisateur qui cree le compte et y effectue un depot initial
            $user = $this->tokenStorage->getToken()->getUser();
            $compte->setNumCompte($numCompte);
            $compte->setSolde(0);
            $compte->setCreatedAt($createdAt);
            $compte->setUser($user);
            $compte->setPartenaire($partenaire);  

            $entityManager->persist($compte);
            $entityManager->flush();
                    #####   DEPOT    ######
            $depot->setDeposedAt($deposedAt);
            $depot->setMontantDepot($values->solde);
            $depot->setUser($user);
            $depot->setCompte($compte);

            $entityManager->persist($depot);
            $entityManager->flush();

            ####    MIS A JOUR DU SOLDE DE COMPTE   ####
            $NouveauSolde = ($values->solde+$compte->getSolde());
            $compte->setSolde($NouveauSolde);
            $entityManager->persist($compte);
            $entityManager->flush();

            $data = [
                'status' => 201,
                'message' => 'Compte partenaire bien cree avec un depot initiale de: '.$values->solde
            ];
            return new JsonResponse($data, 201);
        }
        $data = [
            'status' => 500,
            'message' => 'Le login, le password, le ninea du partenaire, le numero de compte ainsi que le montant a deposer
             doivent etre renseigner'
        ];
        return new JsonResponse($data, 500);
    }

    public function getLastCompte(){
        $ripo = $this->getDoctrine()->getRepository(Compte::class);
        $compte = $ripo->findBy([], ['id'=>'DESC']);
        if(!$compte){
            $cpt = 1;
        }else{
            $cpt = ($compte[0]->getId()+1);
        }
        return $cpt;
      }
}