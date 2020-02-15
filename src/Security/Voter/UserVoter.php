<?php

namespace App\Security\Voter;

use App\Entity\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class UserVoter extends Voter
{
    protected function supports($attribute, $subject)
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, ['POST', 'GET', 'PUT','DELETE'])
            && $subject instanceof \App\Entity\User;    
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        // SI L'UTILISATEUR EST ANONYME, INTERDIT LUI L'ACCES
        if (!$user instanceof UserInterface) {
            return false;
        }
         // SI L'UTILISATEUR A UN ROLE SUPER_ADMIN, DONNE LUI L'ACCES, IL PEUT TOUT FAIRE
        if($user->getRoles()[0] === 'ROLE_SUPER_ADMIN')
        {
            return true;
        }
     
         // L'ADMIN PEUT CREER UN CAISSIER ET PARTENAIRE
        if($user->getRoles()[0] === 'ROLE_ADMIN' && 
            ($subject->getRole()->getLibelle() === 'Caissier' ||
            $subject->getRole()->getLibelle() === 'Partenaire'))
            {
                return true;
            }
        // LE CAISSIER NE PEUT CREER QU'UN PARTENAIRE
        if($user->getRoles()[0] === 'ROLE_CAISSIER' && 
            ($subject->getRole()->getLibelle() === 'Partenaire'))
            {
                return true;
            }

        return false;
    }
}
