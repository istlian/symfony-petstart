<?php

/*
 * Обучение: https://symfony.com/doc/current/routing.html
 */

namespace App\Controller;

/**
 * Sub-Domain Routing
 *
 * @author Ivan
 */
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="mobile_homepage", host="m.example.com")
     */
    public function mobileHomepage(): Response
    {
        // ...
    }

    /**
     * @Route("/home", name="homepage", stateless=true)
     */
    public function homepage(): Response
    {
        // ...
    }
}
