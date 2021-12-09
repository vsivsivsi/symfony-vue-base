<?php

namespace App\Controller;

use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @deprecated
 */
class ProductController extends AbstractController
{
    #[Route('/product', name: 'product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    #[Route('/product/create', name: 'product-create')]
    public function create(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $brand = new Brand();
        $brand->setName('Rats house')->setDescription('Rats house brand description');

        $category = new Category();
        $category
            ->setName('Rats')
            ->setDescription('Rats category description');

        $product = new Product();
        $product
            ->setName('Prod 1')
            ->setDescription('Prod 1 product description')
            ->setPrice(1.00)
            ->setStockQuantity(100)
            ->setBrand($brand)
            ->setCategory($category);

        $entityManager->persist($brand);
        $entityManager->persist($category);
        $entityManager->persist($product);
        $entityManager->flush();

        return new Response('Product created successfully ' . $product->getId());
    }

    #[Route('/product/{id}', name: 'product-view')]
    public function view(int $id): Response
    {
        $product = $this->getDoctrine()->getRepository('App:Product')->find($id);
        if (!$product) {
            throw $this->createNotFoundException();
        }

        dump($product);
        dump($product->getCategory()->getName());

//        return new Response( print_r($product->getId(), true));

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
}
