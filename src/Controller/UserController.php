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
        $form = $this->createForm(UserType::class);

        $form->handleRequest($request);
        //dump($form->get('cgu')->getData());

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
