<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    #[Route('/about', name: 'about')]
    public function index(): Response
    {
        $users = [
            [
                'username' => '1',
                'subscribed' => true,
                'created_at' => true,
            ],
            [
                'username' => '2',
                'subscribed' => false,
                'created_at' => true,
            ],
        ];
        return $this->render('about/index.html.twig', [
            'controller_name' => 'AboutController',
            'hello' => 'Test hello',
            'users' => $users,
        ]);
    }
}
