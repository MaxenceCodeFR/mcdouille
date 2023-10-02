<?php

namespace App\DataFixtures;


use App\Entity\Users;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordEncoder)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new Users();
        $admin->setEmail('admin@mcdouille.fr');
        $admin->setFirstname('Admin');
        $admin->setLastname('McDouille');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordEncoder->hashPassword($admin, 'admin'));

        $manager->persist($admin);

        //Initialisation de Faker
        $faker = \Faker\Factory::create('fr_FR');

        // Boucle pour créer 5 utilisateurs avec des emails et des mots de passe différents
        for ($usr = 1; $usr <= 5; $usr++) {
            $user = new Users();
            $user->setEmail($faker->email());
            $user->setFirstname($faker->firstName());
            $user->setLastname($faker->lastName());
            $user->setRoles(['ROLE_USER']);
            $user->setPassword($this->passwordEncoder->hashPassword($user, 'azerty123'));

            $manager->persist($user);
        }

        $manager->flush();
    }
}
