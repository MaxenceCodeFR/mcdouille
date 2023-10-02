<?php

namespace App\Controller;

// use App\Entity\Products;
use App\Entity\Categories;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/categories', name: 'categories_')]
class CategoriesController extends AbstractController
{
    #[Route('/{id}', name: 'list')]
    public function list(Categories $categories): Response
    {
        //Récupération des produits de la catégorie
        $products = $categories->getProducts();

        return $this->render('categories/list.html.twig', compact('categories', 'products'));
    }

    // #[Route('/{id}', name: 'details')]
    // public function details(Products $products): Response
    // {
    //     return $this->render('categories/details.html.twig', compact('products'));
    // }
}
