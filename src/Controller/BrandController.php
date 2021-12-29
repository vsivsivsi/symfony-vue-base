<?php

namespace App\Controller;

use App\Entity\Brand;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BrandController extends AbstractController
{
    #[Route('/brands', name: 'brand_list')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Brand::class);
        $brands = $repository->findAll();
        dump($brands);
        return $this->render('brand/index.html.twig', [
            'controller_name' => 'BrandController',
        ]);
    }

    #[Route('/brands/{id}', name: 'brand_view')]
    public function view(Brand $brand): Response
    {
        dump($brand);

        return $this->render('booking/index.html.twig', [
            'controller_name' => 'BookingController',
        ]);
    }
}
