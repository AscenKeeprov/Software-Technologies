<?php

namespace BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BlogBundle\Entity\Article;

class BlogController extends Controller
{
    /**
     * @Route("/", name="blog_index")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render("blog/index.html.twig", ["articles" => $articles]);
    }
}
