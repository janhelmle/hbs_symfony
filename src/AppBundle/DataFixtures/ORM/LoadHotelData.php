<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Hotel;

class LoadHotelData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {

        $ho1 = new Hotel();
        $ho1->setEmail('test@test.com');
        $ho1->setIdentifier('Testhotel');
        $manager->persist($ho1);
        $this->addReference('testhotel', $ho1);
        $manager->flush();
        unset($ho1);
    }

    public function getOrder() {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }

}
