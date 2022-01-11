<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\UserType;

class UserController extends AbstractController
{
    #[Route('/register', name: 'user_register')]
    public function register(Request $request): Response
    {
        $form = $this->createForm(
            UserType::class,
            null,
            [
                'validation_groups' => ['CREATE', 'Default'],
            ]
        );

        $form->handleRequest($request);
        
        // on a sorti le cgu du model, on l'ajoute comme condition pour la validation:
        if ($form->isSubmitted() && $form->isValid() && $form->get('cgu')->getData()) {
            $user = $form->getData();
            dd($user);
            
            // todo registration process
        }

        // else
        return $this->render('user/register.html.twig', [
            // careful, createView method required
            'form' => $form->createView()
        ]);
    }
}
