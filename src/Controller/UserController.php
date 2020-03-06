<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/register", name="user_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $userPasswordEncoderInterface)
    {
        //j'initialise un objet vide représantant l'utilisateur
        $user = new User();
        //je crée un objet formulaire possédant les propriétés de RegisterType
        $form = $this->createForm(RegisterType::class, $user);
        //j'handle le request, c'est à dire que je fais en sorte que les données de mon formulaire soient automatiquement
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $passwordEncode = $userPasswordEncoderInterface->encodePassword($user, $user->getPassword());
            $entityManager = $this->getDoctrine()->getManager();
            $user->setPassword($passwordEncode);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_register');
        }    

        return $this->render('user/register.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
