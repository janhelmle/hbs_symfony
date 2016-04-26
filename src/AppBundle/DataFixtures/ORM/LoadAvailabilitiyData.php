<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Availability;

class LoadAvailabilityData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {

        $av1 = new Availability();
        $av1->setDate(new \DateTime("2016-01-01"));
        $av1->setQuantity(4);
        $av1->setRoomType($this->getReference('singleroom'));
        $manager->persist($av1);
        $manager->flush();
        unset($av1);

        $av2 = new Availability();
        $av2->setDate(new \DateTime("2016-01-01"));
        $av2->setQuantity(4);
        $av2->setRoomType($this->getReference('doubleroom'));
        $manager->persist($av2);
        $manager->flush();
        unset($av2);

        $av3 = new Availability();
        $av3->setDate(new \DateTime("2016-01-01"));
        $av3->setQuantity(4);
        $av3->setRoomType($this->getReference('twinroom'));
        $manager->persist($av3);
        $manager->flush();
        unset($av3);

        $av4 = new Availability();
        $av4->setDate(new \DateTime("2016-01-01"));
        $av4->setQuantity(4);
        $av4->setRoomType($this->getReference('tripleroom'));
        $manager->persist($av4);
        $manager->flush();
        unset($av4);

        $av5 = new Availability();
        $av5->setDate(new \DateTime("2016-01-01"));
        $av5->setQuantity(4);
        $av5->setRoomType($this->getReference('familyroom'));
        $manager->persist($av5);
        $manager->flush();
        unset($av5);

        $av6 = new Availability();
        $av6->setDate(new \DateTime("2016-01-01"));
        $av6->setQuantity(4);
        $av6->setRoomType($this->getReference('apartmentsingle'));
        $manager->persist($av6);
        $manager->flush();
        unset($av6);

        $av7 = new Availability();
        $av7->setDate(new \DateTime("2016-01-01"));
        $av7->setQuantity(4);
        $av7->setRoomType($this->getReference('apartmentdouble'));
        $manager->persist($av7);
        $manager->flush();
        unset($av7);
    }

    public function getOrder() {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 9;
    }

}
