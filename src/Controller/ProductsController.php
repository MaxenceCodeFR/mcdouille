<?php


namespace App\Controller;

use App\Entity\Allergens;
use App\Entity\Products;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route(path: '/products', name: 'products_')]
class ProductsController extends AbstractController
{
    #[Route(path: '/', name: 'index')]
    public function index(): Response
    {

        return $this->render('products/index.html.twig');
    }

    #[Route(path: '/{id}', name: 'details')]
    public function details(Products $products,): Response
    {

        return $this->render('products/details.html.twig', compact('products'));
    }
}
