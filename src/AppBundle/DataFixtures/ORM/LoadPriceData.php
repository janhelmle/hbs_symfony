<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Price;

class LoadPriceData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {

        $pr1 = new Price();
        $pr1->setDate(new \DateTime("2016-01-01"));
        $pr1->setValue(110.00);
        $pr1->setProduct($this->getReference('singleroom'));
        $manager->persist($pr1);
        $manager->flush();
        unset($pr1);

        $pr1a = new Price();
        $pr1a->setDate(new \DateTime("2016-01-15"));
        $pr1a->setValue(120.00);
        $pr1a->setProduct($this->getReference('singleroom'));
        $manager->persist($pr1a);
        $manager->flush();
        unset($pr1a);

        $pr1b = new Price();
        $pr1b->setDate(new \DateTime("2016-02-01"));
        $pr1b->setValue(130.00);
        $pr1b->setProduct($this->getReference('singleroom'));
        $manager->persist($pr1b);
        $manager->flush();
        unset($pr1b);

        $pr2 = new Price();
        $pr2->setDate(new \DateTime("2016-01-01"));
        $pr2->setValue(120.00);
        $pr2->setProduct($this->getReference('doubleroom'));
        $manager->persist($pr2);
        $manager->flush();
        unset($pr2);

        $pr3 = new Price();
        $pr3->setDate(new \DateTime("2016-01-01"));
        $pr3->setValue(130.00);
        $pr3->setProduct($this->getReference('twinroom'));
        $manager->persist($pr3);
        $manager->flush();
        unset($pr3);

        $pr4 = new Price();
        $pr4->setDate(new \DateTime("2016-01-01"));
        $pr4->setValue(140.00);
        $pr4->setProduct($this->getReference('tripleroom'));
        $manager->persist($pr4);
        $manager->flush();
        unset($pr4);

        $pr5 = new Price();
        $pr5->setDate(new \DateTime("2016-01-01"));
        $pr5->setValue(150.00);
        $pr5->setProduct($this->getReference('familyroom'));
        $manager->persist($pr5);
        $manager->flush();
        unset($pr5);

        $pr6 = new Price();
        $pr6->setDate(new \DateTime("2016-01-01"));
        $pr6->setValue(160.00);
        $pr6->setProduct($this->getReference('apartmentsingle'));
        $manager->persist($pr6);
        $manager->flush();
        unset($pr6);

        $pr7 = new Price();
        $pr7->setDate(new \DateTime("2016-01-01"));
        $pr7->setValue(170.00);
        $pr7->setProduct($this->getReference('apartmentdouble'));
        $manager->persist($pr7);
        $manager->flush();
        unset($pr7);

        $pr8 = new Price();
        $pr8->setDate(new \DateTime("2016-01-01"));
        $pr8->setValue(12.50);
        $pr8->setProduct($this->getReference('halfpension'));
        $manager->persist($pr8);
        $manager->flush();
        unset($pr8);

        $pr9 = new Price();
        $pr9->setDate(new \DateTime("2016-01-01"));
        $pr9->setValue(25.00);
        $pr9->setProduct($this->getReference('fullpension'));
        $manager->persist($pr9);
        $manager->flush();
        unset($pr9);

        $pr10 = new Price();
        $pr10->setDate(new \DateTime("2016-01-01"));
        $pr10->setValue(8.00);
        $pr10->setProduct($this->getReference('breakfast'));
        $manager->persist($pr10);
        $manager->flush();
        unset($pr10);

        $pr12 = new Price();
        $pr12->setDate(new \DateTime("2016-01-01"));
        $pr12->setValue(0.00);
        $pr12->setProduct($this->getReference('noboarding'));
        $manager->persist($pr12);
        $manager->flush();
        unset($pr12);

        $pr13 = new Price();
        $pr13->setDate(new \DateTime("2016-01-01"));
        $pr13->setValue(12.50);
        $pr13->setProduct($this->getReference('champagnebreakfast'));
        $manager->persist($pr13);
        $manager->flush();
        unset($pr13);

        $pr14 = new Price();
        $pr14->setDate(new \DateTime("2016-01-01"));
        $pr14->setValue(30.00);
        $pr14->setProduct($this->getReference('rosesinrooms'));
        $manager->persist($pr14);
        $manager->flush();
        unset($pr14);

        $pr15 = new Price();
        $pr15->setDate(new \DateTime("2016-01-01"));
        $pr15->setValue(25.00);
        $pr15->setProduct($this->getReference('raftingtour'));
        $manager->persist($pr15);
        $manager->flush();
        unset($pr15);

        $pr16 = new Price();
        $pr16->setDate(new \DateTime("2016-01-01"));
        $pr16->setValue(00.00);
        $pr16->setProduct($this->getReference('notenabledroomtype'));
        $manager->persist($pr16);
        $manager->flush();
        unset($pr16);

        $pr17 = new Price();
        $pr17->setDate(new \DateTime("2016-01-01"));
        $pr17->setValue(00.00);
        $pr17->setProduct($this->getReference('notenabledboarding'));
        $manager->persist($pr17);
        $manager->flush();
        unset($pr17);

        $pr18 = new Price();
        $pr18->setDate(new \DateTime("2016-01-01"));
        $pr18->setValue(00.00);
        $pr18->setProduct($this->getReference('notenabledspecial'));
        $manager->persist($pr18);
        $manager->flush();
        unset($pr18);

        /////////////////////////////////////////////////////
        // Test Data
        /////////////////////////////////////////////////////

        $pr20 = new Price();
        $pr20->setDate(new \DateTime("2099-01-01"));
        $pr20->setValue(31.00);
        $pr20->setProduct($this->getReference('singleroom'));
        $manager->persist($pr20);
        $manager->flush();
        unset($pr20);

        $pr21 = new Price();
        $pr21->setDate(new \DateTime("2099-01-01"));
        $pr21->setValue(37.00);
        $pr21->setProduct($this->getReference('doubleroom'));
        $manager->persist($pr21);
        $manager->flush();
        unset($pr21);

        $pr22 = new Price();
        $pr22->setDate(new \DateTime("2099-01-01"));
        $pr22->setValue(41.00);
        $pr22->setProduct($this->getReference('twinroom'));
        $manager->persist($pr22);
        $manager->flush();
        unset($pr22);

        $pr23 = new Price();
        $pr23->setDate(new \DateTime("2099-01-01"));
        $pr23->setValue(43.00);
        $pr23->setProduct($this->getReference('tripleroom'));
        $manager->persist($pr23);
        $manager->flush();
        unset($pr23);

        $pr24 = new Price();
        $pr24->setDate(new \DateTime("2099-01-01"));
        $pr24->setValue(47.00);
        $pr24->setProduct($this->getReference('familyroom'));
        $manager->persist($pr24);
        $manager->flush();
        unset($pr24);

        $pr25 = new Price();
        $pr25->setDate(new \DateTime("2099-01-01"));
        $pr25->setValue(53.00);
        $pr25->setProduct($this->getReference('apartmentsingle'));
        $manager->persist($pr25);
        $manager->flush();
        unset($pr25);

        $pr26 = new Price();
        $pr26->setDate(new \DateTime("2099-01-01"));
        $pr26->setValue(59.00);
        $pr26->setProduct($this->getReference('apartmentdouble'));
        $manager->persist($pr26);
        $manager->flush();
        unset($pr26);

        $pr27 = new Price();
        $pr27->setDate(new \DateTime("2099-01-01"));
        $pr27->setValue(61.00);
        $pr27->setProduct($this->getReference('halfpension'));
        $manager->persist($pr27);
        $manager->flush();
        unset($pr27);

        $pr28 = new Price();
        $pr28->setDate(new \DateTime("2099-01-01"));
        $pr28->setValue(67.00);
        $pr28->setProduct($this->getReference('fullpension'));
        $manager->persist($pr28);
        $manager->flush();
        unset($pr28);

        $pr29 = new Price();
        $pr29->setDate(new \DateTime("2099-01-01"));
        $pr29->setValue(71.00);
        $pr29->setProduct($this->getReference('breakfast'));
        $manager->persist($pr29);
        $manager->flush();
        unset($pr29);

        $pr30 = new Price();
        $pr30->setDate(new \DateTime("2099-01-01"));
        $pr30->setValue(73.00);
        $pr30->setProduct($this->getReference('noboarding'));
        $manager->persist($pr30);
        $manager->flush();
        unset($pr30);

        $pr31 = new Price();
        $pr31->setDate(new \DateTime("2099-01-01"));
        $pr31->setValue(79.00);
        $pr31->setProduct($this->getReference('champagnebreakfast'));
        $manager->persist($pr31);
        $manager->flush();
        unset($pr31);

        $pr32 = new Price();
        $pr32->setDate(new \DateTime("2099-01-01"));
        $pr32->setValue(83.00);
        $pr32->setProduct($this->getReference('rosesinrooms'));
        $manager->persist($pr32);
        $manager->flush();
        unset($pr32);

        $pr33 = new Price();
        $pr33->setDate(new \DateTime("2099-01-01"));
        $pr33->setValue(89.00);
        $pr33->setProduct($this->getReference('raftingtour'));
        $manager->persist($pr33);
        $manager->flush();
        unset($pr33);

        $pr34 = new Price();
        $pr34->setDate(new \DateTime("2099-01-01"));
        $pr34->setValue(97.00);
        $pr34->setProduct($this->getReference('notenabledroomtype'));
        $manager->persist($pr34);
        $manager->flush();
        unset($pr34);

        $pr35 = new Price();
        $pr35->setDate(new \DateTime("2099-01-01"));
        $pr35->setValue(101.00);
        $pr35->setProduct($this->getReference('notenabledboarding'));
        $manager->persist($pr35);
        $manager->flush();
        unset($pr35);

        $pr36 = new Price();
        $pr36->setDate(new \DateTime("2099-01-01"));
        $pr36->setValue(103.00);
        $pr36->setProduct($this->getReference('notenabledspecial'));
        $manager->persist($pr36);
        $manager->flush();
        unset($pr36);
    }

    public function getOrder() {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 7;
    }

}
