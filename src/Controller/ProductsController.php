<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 *
 */
class ProductsController extends AbstractController
{
    #[Route('/', name: 'products')]
    public function index(): Response
    {
        return $this->render('products/index.html.twig', [
            'controller_name' => 'ProductsController',
        ]);
    }

//    #[Route('/products/{id}', name: 'products-view')]
//    public function read($id): Response
//    {
//        $em = $this->getDoctrine()->getManager(Product::class);
//
//        $repo = $em->getRepository(Product::class);
//
//        $product = $repo->find($id);
//
//        return $this->render('products/index.html.twig', [
//            'controller_name' => 'ProductsController',
//        ]);
//    }
}
