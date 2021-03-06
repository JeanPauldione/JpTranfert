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
class ComptePartExist extends AbstractController
{
    private $tokenStorage;
    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }
    /**
     * @Route("/comptePartenaireExistent", name="creationComptePartenaireExistent", methods={"POST"})
     */
     public function compte_PartenaireExistent(Request $request, EntityManagerInterface $entityManager)
     {
         $values = json_decode($request->getContent());
         if(isset($values->ninea, $values->solde))
         {
             // je controle si l'utilisateur a le droit de creer un compte (appel CompteVoter)
            // $this->denyAccessUnlessGranted('POST_EDIT',$this->getUser());
             $ReposPartenaire = $this->getDoctrine()->getRepository(Partenaire::class);
                 // recuperer de l'utilisateur proprietaire du compte
                 $partenaire = $ReposPartenaire->findOneByNinea(array($values->ninea, $values->solde));
             if ($partenaire) 
             {
                 if ($values->solde > 0) 
                 {
                     $dateJours = new \DateTime();
                     $depot = new Depot();
                     $compte = new Compte();
                     #####   COMPTE    ######
                
                     // recuperer de l'utilisateur qui cree le compte et y effectue un depot initial
                     $user = $this->tokenStorage->getToken()->getUser();

                     ####    GENERATION DU NUMERO DE COMPTE  ####
                     $annee = Date('y');
                     $cpt = $this->getLastCompte();
                     $long = strlen($cpt);
                     $ninea2 = substr($partenaire->getNinea(), -2);
                     $NumCompte = str_pad("SN".$annee.$ninea2, 11-$long, "0").$cpt;
                     $compte->setNumCompte($NumCompte);
                     $compte->setSolde($values->solde);
                     $compte->setCreatedAt($dateJours);
                     $compte->setUser($user);
                     $compte->setPartenaire($partenaire);

                     $entityManager->persist($compte);
                     $entityManager->flush();
                     #####   DEPOT    ######
                     $ReposCompte = $this->getDoctrine()->getRepository(Compte::class);
                     $compteDepos = $ReposCompte->findOneByNumCompte($NumCompte);
                     $depot->setDeposedAt($dateJours);
                     $depot->setMontantDepot($values->solde);
                     $depot->setUser($user);
                     $depot->setCompte($compteDepos);

                     $entityManager->persist($depot);
                     $entityManager->flush();

                 $data = [
                         'status' => 201,
                         'message' => 'Le compte du partenaire est bien cree avec un depot initia de: '.$values->solde
                         ];
                     return new JsonResponse($data, 201);
                 }
                 $data = [
                     'status' => 500,
                     'message' => 'Veuillez saisir un montant de depot valide'
                     ];
                     return new JsonResponse($data, 500);
             }
             $data = [
                 'status' => 500,
                 'message' => 'Desole le NINEA saisie n est ratache a aucun partenaire'
                 ];
                 return new JsonResponse($data, 500);
         }
         $data = [
             'status' => 500,
             'message' => 'Vous devez renseigner le ninea du partenaire, le numero de compte ainsi que le montant a deposer'
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