<?php

namespace App\Controller;

use App\Entity\Booking;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookingController extends AbstractController
{
    #[Route('/bookings', name: 'booking_list')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Booking::class);
        $bookings   = $repository->findAll();
        dump($bookings);

        return $this->render('booking/index.html.twig', [
            'controller_name' => 'BookingController',
        ]);
    }

    #[Route('/bookings/{id}', name: 'booking_view')]
    public function view(Booking $booking): Response
    {
        dump($booking);

        return $this->render('booking/index.html.twig', [
            'controller_name' => 'BookingController',
        ]);
    }
}
