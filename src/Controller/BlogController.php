<?php

/*
 * Обучение: https://symfony.com/doc/current/routing.html
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * Creating Routes as Attributes or Annotations
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/blog/{page}", name="blog_index", defaults={"page": 1, "title": "Hello world!"})
     */
    public function index(int $page, string $title): Response
    {
        // ...
    }
    /**
     * @Route("/blog/{page<\d+>?1}", name="blog_list")
     */
    public function blog_list(int $page)
    {
        // ...
    }
    
    /**
     * @Route("/blog/{slug}", name="blog_show")
     */
    public function show(BlogPost $post): Response
    {
        // $slug will equal the dynamic part of the URL
        // e.g. at /blog/yay-routing, then $slug='yay-routing'

        // ...
    }
}
