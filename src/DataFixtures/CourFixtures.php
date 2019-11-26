<?php

namespace App\DataFixtures;

use App\Entity\Cour;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class CourFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        // $product = new Product();
        // $manager->persist($product);
        for ($i=0;$i<10;$i++) {
            $cour = new Cour();
            $cour->setLibelle($faker->colorName);
            $manager->persist($cour);
        }
        $manager->flush();
    }
}
