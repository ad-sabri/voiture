<?php

namespace App\DataFixtures;

use App\Entity\Carburant;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CarburantFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $carburants = [

            [
                'carburant'=>'essence',
            ],
            [
                'carburant'=>'diesel',
            ],
        ];

        foreach($carburants as $record){
            
            $carburant = new Carburant();
            $carburant->setCarburant($record['carburant']);

            $manager->persist($carburant);

            $this->addReference($record['carburant'], $carburant);
            
        }

        $manager->flush();
    }
}
