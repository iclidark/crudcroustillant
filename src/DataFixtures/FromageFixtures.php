<?php

namespace App\DataFixtures;

use App\Entity\Fromage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FromageFixtures extends Fixture
{
    private const FROMAGE_REFERENCE = 'Fromage';
    
    public function load(ObjectManager $manager): void
    {
        $nomsFromages = [
            'Cheddar',
            'Mozzarella',
            'Camembert'
        ];

        foreach ($nomsFromages as $key => $nomFromage) {
            $fromage = new Fromage();
            $fromage->setName($nomFromage);
            $manager->persist($fromage);
            $this->addReference(self::FROMAGE_REFERENCE . '_' . $key, $fromage);
        }

        $manager->flush();
    }
}