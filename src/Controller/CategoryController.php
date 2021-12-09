<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'category')]
    public function index(): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }

    #[Route('/category/create', name: 'create_category')]
    public function create(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $category = new Category();
        $category
            ->setName('Cats')
            ->setDescription('Cats category description');

        $entityManager->persist($category);
        $entityManager->flush();

        return new Response('Category created successfully ' . $category->getId());
    }

    #[Route('category/{id}', 'view_category')]
    public function view($id): Response
    {
        $category = $this->getDoctrine()->getRepository('App:Category')->findOneBy(['id' => $id]);

        if (!$category) {
            throw $this->createNotFoundException();
        }
        return new Response(print_r($category, true));
    }
}
