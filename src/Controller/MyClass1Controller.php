<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MyClass1Controller extends AbstractController
{
    public function hell()
    {
        return $this->json(['message' => 'Hello from controller']);
    }

}