<?php

namespace App\Controller;

use App\Entity\ProfessionalExperiences;
use App\Entity\Hobbies;
use App\Entity\Education;

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
        $repo = $this->getDoctrine()->getRepository(ProfessionalExperiences::class);

        $exps = $repo->findAll();
        return $this->render('home/exp.html.twig', [
            'exps'=>$exps
        ]);
    }
    /**
     * @Route("/hobby", name="hobby")
     */
    public function hobby(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Hobbies::class);

        $hobbies = $repo->findAll();
        return $this->render('home/hobby.html.twig', [
            'hobbies'=> $hobbies
        ]);
    }
    /**
     * @Route("/education", name="education")
     */
    public function education(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Education::class);

        $educa = $repo->findAll();
        return $this->render('home/education.html.twig', [
            'educations' => $educa
        ]);
    }
}
