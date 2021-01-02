<?php

/*
 * Обучение: https://symfony.com/doc/current/routing.html
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Localized Routes (i18n)
 *
 * @author Ivan
 */
class CompanyController extends AbstractController
{
    /**
     * @Route({
     *     "en": "/about-us",
     *     "nl": "/over-ons"
     * }, name="about_us")
     */
    public function about(): Response
    {
        // ...
    }
}
