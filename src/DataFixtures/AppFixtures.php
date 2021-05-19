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
      
        for( $i=0; $i < 20; $i++){
            $exp = new ProfessionalExperiences();
            $exp->setTitle($faker->jobTitle);
            $exp->setCompany($faker->company);
            $exp->setCreatedAt(new DateTime());
            $date1 = $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null);
            $exp->setStartDate($date1);
            $exp->setEndDate($faker->dateTimeBetween($startDate = $date1, $endDate = 'now', $timezone = null));
            $exp->setDescription($faker->text($faker->numberBetween(500,700)));
            $exp->setAddress($faker->city);
            $manager->persist($exp);
        }
        $hob_icons= ["sports_esports", "sailing","kayaking","sports_hockey", "emoji_nature", "emoji_food_beverage","construction","deck"];
        for( $i=0; $i < 10; $i++){
            $hob = new Hobbies();
            $hob->setName($faker->word);
            $hob->setCreatedAt(new DateTime());
            if (isset($hob_icons[$i])){
                $hob->setIcon($hob_icons[$i]);
            }
            else {
                $hob->setIcon($faker->word);
            }
            $hob->setDescription($faker->text($faker->numberBetween(100,400)));
            $manager->persist($hob);
        }
        for( $i=0; $i < 15; $i++){
            $edu = new Education();
            $edu->setTitle($faker->jobTitle);
            $edu->setDiploma($faker->words($nb = $faker->numberBetween(2,7), $asText = true));
            $edu->setCreatedAt(new DateTime());
            $edu->setFulfillment($faker->numberBetween(50,100));
            $edu->setDiplomaDate($faker->dateTimeBetween($startDate = '-35 years', $endDate = 'now', $timezone = null));
            $edu->setDescription($faker->text($faker->numberBetween(500,700)));
            $edu->setAddress($faker->city);
            $manager->persist($edu);
        }

        $manager->flush();
    }
}
