<?php

namespace App\Controller;

use App\Entity\Brand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BrandController extends AbstractController
{
    #[Route('/brand', name: 'brand')]
    public function index(): Response
    {
        return $this->render(
            'brand/index.html.twig',
            [
                'controller_name' => 'BrandController',
            ]
        );
    }

    #[Route('/brand/create', name: 'brand-create')]
    public function create(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $brand = new Brand();
        $brand->setName('Audi')->setDescription('Audi brand description');

        $entityManager->persist($brand);
        $entityManager->flush();

        return new Response('Brand created successfully ' . $brand->getId());
    }

    #[Route('/brand/update/{id}', name: 'brand-update')]
    public function update(int $id, ): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $brand = $this->getDoctrine()->getRepository('App:Brand')->find($id)        ;

        if (!$brand) {
            throw $this->createNotFoundException();
        }
        $brand
//            ->setName('Audi')
            ->setDescription('Audi brand description 2');

        $entityManager->persist($brand);
        $entityManager->flush();

        return new Response('Brand updated successfully ' . print_r($brand, true));
    }

    #[Route('/brand/{id}', name: 'brand-view')]
    public function view(int $id, ): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $brand = $this->getDoctrine()->getRepository('App:Brand')->find($id)        ;
        if (!$brand) {
            throw $this->createNotFoundException();
        }
        $brand
//            ->setName('Audi')
            ->setDescription('Audi brand description 2');

        $entityManager->persist($brand);
        $entityManager->flush();

        return new Response( print_r($brand, true));
    }

    #[Route('/brand/remove/{id}', name: 'brand-remove')]
    public function remove(int $id, ): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $brand = $this->getDoctrine()->getRepository('App:Brand')->find($id);
        if (!$brand) {
            throw $this->createNotFoundException();
        }

        $entityManager->remove($brand);
        $entityManager->flush();

        return new Response( print_r($brand, true));
    }
}
