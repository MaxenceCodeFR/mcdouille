<?php

namespace App\DataFixtures;

use App\Entity\Products;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;;

class ProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($prod = 1; $prod <= 15; $prod++) {
            $product = new Products();
            $product->setName($faker->word());
            $product->setDescription($faker->text());
            $product->setPrice($faker->numberBetween(1000, 0, 150000));

            //On récupère la référence de la catégorie
            //pour avoir des produits dans une catégorie au moins
            $category = $this->getReference('category_' . rand(1, 11));
            $product->setCategories($category);

            //On récupère la référence de l'allergène
            //pour avoir des produits avec un allergène au moins
            $allergen = $this->getReference('allergen_' . rand(1, 14));
            $product->setAllergens($allergen);

            //On crée la référence à l'image
            $this->setReference('prod-' . $prod, $product);

            $manager->persist($product);
        }
        $manager->flush();
    }
}
