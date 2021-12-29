<?php

namespace App\Controller;

use App\Entity\Customer;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    #[Route('/customers', name: 'customer_list')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Customer::class);
        $customers = $repository->findAll();
        dump($customers);
        return $this->render('customer/index.html.twig', [
            'controller_name' => 'CustomerController',
        ]);
    }
}
