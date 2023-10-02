<?php

namespace App\DataFixtures;

use App\Entity\Allergens;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;;

class AllergensFixtures extends Fixture
{
    private $counterAller = 1;
    public function load(ObjectManager $manager): void
    {
        $this->createAllergens('Gluten', $manager);
        $this->createAllergens('Crustacés', $manager);
        $this->createAllergens('Oeufs', $manager);
        $this->createAllergens('Poissons', $manager);
        $this->createAllergens('Arachides', $manager);
        $this->createAllergens('Soja', $manager);
        $this->createAllergens('Lait', $manager);
        $this->createAllergens('Fruits à coque', $manager);
        $this->createAllergens('Céleri', $manager);
        $this->createAllergens('Moutarde', $manager);
        $this->createAllergens('Graines de sésame', $manager);
        $this->createAllergens('Sulfites', $manager);
        $this->createAllergens('Lupin', $manager);
        $this->createAllergens('Mollusques', $manager);

        $manager->flush();
    }

    public function createAllergens($name, ObjectManager $manager): Allergens
    {
        $allergen = new Allergens();
        $allergen->setName($name);
        $manager->persist($allergen);

        $this->addReference('allergen_' . $this->counterAller, $allergen);
        $this->counterAller++;

        return $allergen;
    }
}
