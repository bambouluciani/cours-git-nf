<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index()
    {
        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }
    
    /**
     * @Route("/cgv", name="app_cgv")
     */
    public function cgv()
    {
        return $this->render('app/cgv.html.twig', [
            'title' => 'Conditions générales de ventes',
        ]);
    }

    /**
     * @Route("/about", name="app_about")
     */
    public function about()
    {
        return $this->render('app/about.html.twig', [
            'title' => 'A propos',
        ]);
    }
}
