<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class NavBarController extends AbstractController
{
    public function index(CategoriesRepository $categoriesRepository): Response
    {
        return $this->render('embbed/_embbed_nav.html.twig', [
            'categories' => $categoriesRepository->findBy([], ['categoryOrder' => 'asc']),
        ]);
    }
}
