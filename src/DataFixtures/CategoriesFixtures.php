<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class CategoriesFixtures extends Fixture
{
    private $counter = 1;
    public function load(ObjectManager $manager): void
    {



        $parentBurgers = $this->createCategory('Burgers', null, $manager);
        $this->createCategory('Boeufs', $parentBurgers, $manager);
        $this->createCategory('Poulets', $parentBurgers, $manager);
        $this->createCategory('Végétariens', $parentBurgers, $manager);

        $parentDrinks = $this->createCategory('Boissons', null, $manager);
        $this->createCategory('Eaux', $parentDrinks, $manager);
        $this->createCategory('Sodas', $parentDrinks, $manager);

        $parentDesserts = $this->createCategory('Desserts', null, $manager);
        $this->createCategory('Gâteaux', $parentDesserts, $manager);
        $this->createCategory('Glaces', $parentDesserts, $manager);
        $this->createCategory('Yaourts', $parentDesserts, $manager);

        $manager->flush();
    }

    public function createCategory($name, Categories $parent = null, ObjectManager $manager): Categories
    {
        $category = new Categories();
        $category->setName($name);
        $category->setParent($parent);
        $manager->persist($category);

        $this->addReference('category_' . $this->counter, $category);
        $this->counter++;

        return $category;
    }
}
