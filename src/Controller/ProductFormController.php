<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ProductType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductFormController extends AbstractController
{
    #[Route('/product/formGet', name: 'app_get_product_form', methods:['GET'])]
    function getFormDatas(UserRepository $productsRepository) : Response {
        
        $products = $productsRepository->findAll();

        return $this->render('product_form/form_get.html.twig', [
            'products' => $products
        ]);
    }

    #[Route('/product/form', name: 'app_product_form')]
    public function handleForm(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $product = new User();
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManagerInterface->persist($product);
            $entityManagerInterface->flush();

            return $this->redirectToRoute('app_product_form');
        }

        return $this->render('product_form/index.html.twig', [
            'form' => $form,
        ]);
    }
}
