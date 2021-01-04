<?php

/*
 * Обучение: https://symfony.com/doc/current/routing.html
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Creating Routes as Attributes or Annotations
 */
/**
 * @Route("/blog", requirements={"_locale": "en|es|fr"}, name="blog_")
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/", name="blog_index")
     */
    public function index(): Response
    {
        // ...
        return $this->render('blog/index.html.twig', ['blog_posts ' => []]);
    }

    /**
     * @Route("/article/{slug}", name="blog_post")
     */
    public function show(string $slug): Response
    {
        // ...
    }
    
    /**
     * @Route("/{_locale}", name="list")
     */
    public function listing(Request $request): Response
    {
        $routeName = $request->attributes->get('_route');
        $routeParameters = $request->attributes->get('_route_params');

        // use this to get all the available attributes (not only routing ones):
        $allAttributes = $request->attributes->all();

        // ...
        
        // generate a URL with no route arguments
        $signUpPage = $this->generateUrl('sign_up');

        // generate a URL with route arguments
        $userProfilePage = $this->generateUrl('user_profile', [
            'username' => $user->getUsername(),
        ]);

        // generated URLs are "absolute paths" by default. Pass a third optional
        // argument to generate different URLs (e.g. an "absolute URL")
        $signUpPage = $this->generateUrl('sign_up', [], UrlGeneratorInterface::ABSOLUTE_URL);

        // when a route is localized, Symfony uses by default the current request locale
        // pass a different '_locale' value if you want to set the locale explicitly
        $signUpPageInDutch = $this->generateUrl('sign_up', ['_locale' => 'nl']);

        // ...
    }
    
    public function recentArticles(int $max = 3): Response
    {
        // get the recent articles somehow (e.g. making a database query)
        $articles = ['...', '...', '...'];

        return $this->render('blog/_recent_articles.html.twig', [
            'articles' => $articles
        ]);
    }
}
