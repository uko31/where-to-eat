<?php

namespace App\Controller;

use App\Repository\InMemoryRestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/*
 * cette syntaxte permet de définir une racine et un préfix 
 * pour toutes les routes définies dans la classe.
*/
#[Route('/restaurant', name: 'restaurant')]
class RestaurantController extends AbstractController
{
    #[Route(
        '',
        name: 'home',
        methods: ['GET']
    )]
    public function index(InMemoryRestaurantRepository $restaurantRepository): Response
    {
        $restaurants = $restaurantRepository->findAll();

        return $this->render('restaurant/index.html.twig', [
            'restaurants' => $restaurants,
        ]);
    }

    #[Route(
        '/{id}',
        name: 'show',
        methods: ['GET']
    )]
    public function show($id, Request $request): Response
    {
        return $this->render('restaurant/show.html.twig', [
            'controller_name' => 'RestaurantController',
        ]);
    }
}
