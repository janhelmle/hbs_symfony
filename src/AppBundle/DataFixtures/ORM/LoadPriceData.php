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
        
    }

    public function getOrder() {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 7;
    }

}
