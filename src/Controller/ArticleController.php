<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="articleIndex")
     */
    public function articleIndex(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);

        $articles = $repo->findAll();

        return $this->render('article/index.html.twig', [
            'articles'=> $articles
        ]);
    }
    /**
     * @Route("/article/{id}", name="articleView")
     */
    public function articleView($id): Response
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);

        $article = $repo->find($id);
        if (!$article)
            return $this->redirectToRoute('articleIndex');
        return $this->render('article/view.html.twig', [
            'article'=> $article
        ]);
    }
}
