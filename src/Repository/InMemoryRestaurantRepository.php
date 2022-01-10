<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Restaurant;
use App\Entity\Address;

class InMemoryRestaurantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Restaurant::class);
    }

    public function findOneById($id): ?Restaurant
    {
        $restaurants = array_filter($this->findAll(), function(Restaurant $restaurant) use ($id) {
            return $restaurant->getId() == $id;
        });

        // Return the first restaurant only
        return reset($restaurants);
    }

    public function findAll(): array
    {
        $r1 = new Restaurant(1);
        $r1
            ->setId(1)
            ->setName('Le Chat Noir')
            ->setLikes(5)
            ->setDislikes(1);

        $r2 = new Restaurant(2);
        $r2
            ->setId(2)
            ->setName('Boui Boui Lao')
            ->setLikes(25)
            ->setDislikes(2);

        $r3 = new Restaurant(3);
        $r3
            ->setId(3)
            ->setName('Les Crulotés')
            ->setLikes(12)
            ->setDislikes(3);

        $addr1 = new Address();
        $addr1
            ->setStreet('10 rue Maury')
            ->setZip('31000')
            ->setCity('Toulouse')
            ->setCountry('France');

        $addr2 = new Address();
        $addr2
            ->setStreet('30 Rue Jean Palaprat')
            ->setZip('31000')
            ->setCity('Toulouse')
            ->setCountry('France');

        $addr3 = new Address();
        $addr3
            ->setStreet('13 Place Dupuy')
            ->setZip('31000')
            ->setCity('Toulouse')
            ->setCountry('France');

        $r1->setAddress($addr1);
        $r2->setAddress($addr2);
        $r3->setAddress($addr3);

        return [$r1, $r2, $r3];
    }
}