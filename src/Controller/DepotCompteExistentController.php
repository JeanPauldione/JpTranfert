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
class DepotCompteExistentController extends AbstractController
{
    private $tokenStorage;
    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }
    
    /**
     * @Route("/depotCompteExistent", name="DepotCompteExistent", methods={"POST"})
     */
     public function compte_PartenaireExistent(Request $request, EntityManagerInterface $entityManager)
     {
         $values = json_decode($request->getContent());
         if(isset($values->numCompte))
         {
             $ReposProprietaire = $this->getDoctrine()->getRepository(Compte::class);
               //   recupereration de l'utilisateur proprietaire du compte
                 $proprietaire = $ReposProprietaire->findOneBy(array("numCompte"=>$values->numCompte));
                 //dd($proprietaire);
             if ($proprietaire) 
             {
                 if ($values->montantDepot > 0) 
                 {
                     $dateJours = new \DateTime();
                     $depot = new Depot();
                
                     #####   COMPTE    ######
                
                     // recuperer de l'utilisateur qui cree le compte et y effectue un depot initial
                     $user = $this->tokenStorage->getToken()->getUser();

                     $depot->setDeposedAt($dateJours);
                     $depot->setMontantDepot($values->montantDepot);
                     $depot->setCompte($proprietaire);
                     $depot->setUser($user);
                    //dd($depot);
                     $entityManager->persist($depot);
                     $solde = $proprietaire->getSolde();
                    //dd($solde);
                     $proprietaire->setSolde($solde + $values->montantDepot);

                     $entityManager->flush();

                 $data = [
                         'status' => 201,
                         'message' => 'Depot reussi pour un montant de: '.$values->montantDepot
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
             'message' => 'Vous devez renseigner le numero de compte ainsi que le montant a deposer'
             ];
             return new JsonResponse($data, 500);
            }
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