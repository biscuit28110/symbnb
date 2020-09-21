<?php

namespace App\DataFixtures;
use App\Entity\Ad;
use Faker\Factory;
use Cocur\Slugify\Slugify;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('FR-fr');
        $slugify= new Slugify();

        $title = $faker-> sentence();
        $slug= $slugify->slugify($title);
        $coverImage = $faker->imageUrl(1000,350);
        $introduction = $faker -> paragraph(2);
        $content = '<p>' . join('</p><p>',$faker->paragraphs(5)) . '</p>';
        


        for($i =1; $i <= 30; $i++) {
        $ad = new Ad();

        $ad->setTitle($title)
            ->setSlug("titre-de-l-annonce-n-$i")
            ->setCoverImage($coverImage)
            ->setIntroduction($introduction)
            ->setContent($content)
            ->setPrice(mt_rand(40,200))
            ->setRooms(mt_rand(1,5));
        
         $manager->persist($ad);
        }

        
        $manager->flush();
    }
}
