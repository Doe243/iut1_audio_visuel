<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Role;
use App\Entity\LpRole;
use App\Entity\LpUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    
    public function __construct(UserPasswordEncoderInterface $encoder) {
            $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        /**Création du role Etudiant */

        $RoleJobEtud = new LpRole();

        $RoleJobEtud->setName('ROLE_JOB_ETUD');

        $manager->persist($RoleJobEtud);

        $JobEtudUser = new LpUser();

        $JobEtudUser->setFirstName('John')
                  ->setLastName('Doe')
                  ->setEmail('j.doe@symfony.com')
                  ->setPassword($this->encoder->encodePassword($JobEtudUser, 'password'))
                  ->setBanned(0)
                  ->addUserRole($RoleJobEtud);
        $manager->persist($JobEtudUser);

          /**Création du role Etudiant */

          $RoleEtud = new LpRole();

          $RoleEtud->setName('ROLE_ETUD');
  
          $manager->persist($RoleEtud);
  
          $EtudUser = new LpUser();
  
          $EtudUser->setFirstName('Laurent')
                    ->setLastName('Biancone')
                    ->setEmail('l.laurent@symfony.com')
                    ->setPassword($this->encoder->encodePassword($EtudUser, 'password'))
                    ->setBanned(0)
                    ->addUserRole($RoleEtud);
          $manager->persist($EtudUser); 

        /**Création du role Prof */

        $RoleProf = new LpRole();

        $RoleProf->setName('ROLE_PROF');

        $manager->persist($RoleProf);

        $ProfUser = new LpUser();

        $ProfUser->setFirstName('Tristan')
                  ->setLastName('Ceccato')
                  ->setEmail('t.ceccato@symfony.com')
                  ->setPassword($this->encoder->encodePassword($ProfUser, 'password'))
                  ->setBanned(0)
                  ->addUserRole($RoleProf);
        $manager->persist($ProfUser); 

         /**Création de l'Admin */

        $adminRole = new LpRole();

        $adminRole->setName('ROLE_ADMIN');

        $manager->persist($adminRole);

        $adminUser = new LpUser();

        $adminUser->setFirstName('René')
                  ->setLastName('Mumba')
                  ->setEmail('renemumba@symfony.com')
                  ->setPassword($this->encoder->encodePassword($adminUser, 'password'))
                  ->setBanned(0)
                  ->addUserRole($adminRole);
        $manager->persist($adminUser);

        $faker = Factory::create('fr-FR');

        $users = [];
        $genres = ['male', 'female'];

        for ($i=1; $i <= 30 ; $i++) { 

            $user = new LpUser();
            
            $genre = $faker->randomElement($genres);

            $password = $this->encoder->encodePassword($user, 'password');
                

                $user->setFirstname($faker->firstname($genre))
                    ->setLastname($faker->lastName)
                    ->setEmail($faker->email)
                    ->setPassword($password)
                    ->setBanned(0);
            
            
            $manager->persist($user);

        }
        
        $manager->flush();
    }
}
