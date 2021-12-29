<?php

namespace App\DataFixtures;

use App\Factory\BookingFactory;
use App\Factory\BookingItemFactory;
use App\Factory\BrandFactory;
use App\Factory\CustomerFactory;
use App\Factory\ProductFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        BrandFactory::createMany(10);
        ProductFactory::createMany(100, function () {
            return [
                'brand' => BrandFactory::random(),
            ];
        });
        CustomerFactory::createMany(10);
        BookingFactory::createMany(50, function () {
            return [
                'customer' => CustomerFactory::random(),
            ];
        });
        BookingItemFactory::createMany(300, function () {
            return [
                'product' => ProductFactory::random(),
                'booking' => BookingFactory::random(),
            ];
        });

        $manager->flush();
    }
}
