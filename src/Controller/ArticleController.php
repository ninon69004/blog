<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    private $articleRepo;
    private $categoryRepo;

    public function __construct(ArticleRepository $aRepo, CategoryRepository $cRepo)
    {
        $this->articleRepo = $aRepo;
        $this->categoryRepo = $cRepo;

    }
    /**
     * @Route("/article", name="articleIndex")
     */
    public function articleIndex(): Response
    {
        //DRY for repo => private repo
        //$repo = $this->getDoctrine()->getRepository(Article::class);

        $articles = $this->articleRepo->findAll();
        $categories = $this->categoryRepo->findAll();

        return $this->render('article/index.html.twig', [
            'articles'=> $articles,
            'categories'=> $categories
        ]);
    }
    /**
     * @Route("/article/{id}", name="articleView")
     */
    public function articleView($id): Response
    {
        //$repo = $this->getDoctrine()->getRepository(Article::class);

        $article = $this->articleRepo->find($id);
        if (!$article)
            return $this->redirectToRoute('articleIndex');
        return $this->render('article/view.html.twig', [
            'article'=> $article
        ]);
    }

    /**
     * @Route("/article/category/{id}", name="articleCategoryView")
     */
    public function articleCategoryView($id): Response
    {
        //$repo = $this->getDoctrine()->getRepository(Article::class);
        $categories = $this->categoryRepo->findAll();
        $category = $this->categoryRepo->find($id); //ex :findBy([], ['publishedAt' => 'DESC']);
        if (!$category)
            return $this->redirectToRoute('articleIndex');
        $articles = $category->getArticles();
        return $this->render('article/index.html.twig', [
            'articles'=> $articles,
            'categories'=> $categories
        ]);
    }
}
