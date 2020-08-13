<?php

namespace App\DataFixtures;

use App\Entity\Annonce;
use App\DataFixtures\CarburantFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AnnonceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $annonces = [
            [
                'title'=>'Renault Scénic',
                'price'=>10,
                'description'=>'lorem lorem lorem lorem',
                'carburant'=>'essence',
            ],
            [
                'title'=>'Peugeot 206',
                'price'=>14,
                'description'=>'azertyzbdhz azertyzbdhz er azert',
                'carburant'=>'diesel',
            ],
            [
                'title'=>'Dacia Logan',
                'price'=> 8,
                'description'=>'hhsh zbgsaghq bqabq',
                'carburant'=>'essence',
            ],
        ];

        foreach($annonces as $record) {
            $annonce = new Annonce();

            $annonce->setTitle($record['title']);
            $annonce->setPrice($record['price']);
            $annonce->setDescription($record['description']);
            $annonce->setCarburant($this->getReference($record['carburant']));

            $manager->persist($annonce);
        }

        $manager->flush();
    }

    public function getDependencies() {
        return [ 
            CarburantFixtures::class,
        ];
    }
}
