<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="index")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }
    /**
     * @Route("/exp", name="exp")
     */
    public function exp(): Response
    {
        return $this->render('home/exp.html.twig');
    }
    /**
     * @Route("/hobby", name="hobby")
     */
    public function hobby(): Response
    {
        return $this->render('home/hobby.html.twig');
    }
}
