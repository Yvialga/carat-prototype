<?php

namespace App\Controller;

use App\Entity\QuestionsStorage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuestionsStorageController extends AbstractController
{
    // #[Route('/questions/storage', name: 'create_question')]
    public function index(EntityManagerInterface $entityManager): Response {

        $request = new QuestionsStorage();

        // $entityManager->persist($request);
        // $entityManager->flush();

        return new Response('saved new request with ' . $request);
    }
}
