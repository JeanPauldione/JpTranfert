<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

   
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;

    }

    public function load(ObjectManager $manager)
    {
        $role1 = new Role();
        $role1->setLibelle("Super_admin");
        $role2 = new Role();
        $role2->setLibelle("Admin");
        $role3 = new Role();
        $role3->setLibelle("Caissier");
        $role4 = new Role();
        $role4->setLibelle("Partenaire");
        

        $user = new User();
        $user->setUsername("Pierre");
        $user->setEmail("Pierre@gmail.com");
        $user->setIsActive(true);
        $user->setPassword($this->passwordEncoder->encodePassword($user,'123'));

        $user->setRole($role1);


        $manager->persist($role1);
        $manager->persist($role2);
        $manager->persist($role3);
        $manager->persist($role4);

        $manager->persist($user);
        $manager->flush();
    }
}
