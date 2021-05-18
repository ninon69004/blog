<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\User;
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

        $users = [];
        for( $i=0; $i < 50; $i++){
            $user = new User();
            $user->setUsername($faker->name);
            $user->setFirstName($faker->firstName());
            $user->setLastName($faker->lastName());
            $user->setEmail($faker->email());
            $user->setPassword($faker->password());
            $user->setCreatedAt(new DateTime());
            $manager->persist($user);
            $users[] = $user;
        }
        
        $categories = [];
        for( $i=0; $i < 15; $i++){
            $category = new Category();
            $category->setTitle($faker->text(50));
            $category->setDescription($faker->text(250));
            $category->setCreatedAt(new DateTime());
            $manager->persist($category);
            $categories[] = $category;
        }

        $articles = [];
        for($i=0; $i<100; $i++){
            $article= new Article();
            $article->setTitle($faker->text(50));
            $article->setContent($faker->text(6000));
            $article->setCreatedAt(new DateTime());

            $article->setAuthor($users[$faker->numberBetween(0,49)]);
            $article->addCategory($categories[$faker->numberBetween(0,14)]);

            $manager->persist($article);
            $articles[] = $article;
        }

        $manager->flush();
    }
}
