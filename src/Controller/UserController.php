<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\UserType;

class UserController extends AbstractController
{
    #[Route('/register', name: 'user_register')]
    public function register(): Response
    {
        $form = $this->createForm(UserType::class);

        if ($form->isSubmitted() && $form->isValid()) {
            // todo registration process
        }

        // else
        return $this->render('user/register.html.twig', [
            // careful, createView method required
            'form' => $form->createView()
        ]);
    }
}
