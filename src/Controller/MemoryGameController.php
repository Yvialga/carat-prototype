<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MemoryGameController extends AbstractController
{
    #[Route('/memorygame', name: 'app_memory_game')]
    public function index(): Response
    {
        return $this->render('memory_game/index.html.twig',);
    }
}
