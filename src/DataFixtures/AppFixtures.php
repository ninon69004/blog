<?php

namespace App\DataFixtures;

use App\Entity\ProfessionalExperiences;
use App\Entity\Hobbies;
use App\Entity\Education;


use DateTime;
use Faker;
use \joshtronic\LoremIpsum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Faker\Factory::create();

        $exps = [];
        for( $i=0; $i < 50; $i++){
            $exp = new ProfessionalExperiences();
           
            $manager->persist($exp);
            $exps[] = $exp;
        }
        

        $manager->flush();
    }
}
