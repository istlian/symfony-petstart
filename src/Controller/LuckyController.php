<?php

/*
 * Обучение: https://symfony.com/doc/current/page_creation.html
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
/**
 * Генерирует псевдорандомное число и печатает его на экране
 *
 * @author Ivan
 */
class LuckyController extends AbstractController 
{
    
    /**
     * @Route("/lucky/number")
     * @return Response
     */
    public function number(): Response
    {
        $number = random_int(0, 100);
        
        return $this->render('lucky/number.html.twig', ['number' => $number]);
    }
}
