<?php

namespace App\DataFixtures;

use App\Entity\Images;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ImagesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($img = 1; $img <= 50; $img++) {
            $image = new Images();
            $image->setName($faker->image(null, 640, 480));

            //On récupère la référence du produit
            //pour que une image soit associée à un produit au moins
            $product = $this->getReference('prod-' . rand(1, 15));
            $image->setProducts($product);

            $manager->persist($image);
        }

        $manager->flush();
    }

    //Cette fonction indique que ImagesFixtures doit être exécuté après ProductsFixtures
    public function getDependencies(): array
    {
        return [
            ProductsFixtures::class
        ];
    }
}
