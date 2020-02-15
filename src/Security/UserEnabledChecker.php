<?php
namespace App\Security;

use App\Entity\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\Exception\DisabledException;
use Symfony\Component\Security\Core\Exception\AccountStatusException;

class UserEnabledChecker implements UserCheckerInterface
{
    /**
     * Verifie le compte du user avant l'authentification
     * @throws AccountStatusException
     */
    public function checkPreAuth(UserInterface $user)
    {
        if (!$user instanceof User) 
        {
            return;
        }

        if (!$user->getIsActive())
        {
            throw new DisabledException();
            
        }

    }
 
    public function checkPostAuth(UserInterface $user)
    {

    }
}