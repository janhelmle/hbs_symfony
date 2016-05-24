<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use AppBundle\Entity\AdditionalProduct;

class LoadAdditionalProductData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        
        $ap1 = new AdditionalProduct();
        $ap1->setIdentifier("halfpension");
        $ap1->setListText("Halbpension (mit Frühstück)");
        $ap1->setPricingBasis("person,night");
        $ap1->setPricingBasisText("/Pers. u. Nacht");
        $ap1->setPositionInList(1);
        $ap1->setHotel($this->getReference('testhotel'));
        $this->addReference('halfpension', $ap1);
        $ap1->setAdditionalProductcategory($this->getReference('Verpflegung'));
        $manager->persist($ap1);
        $manager->flush();

        $ap2 = new AdditionalProduct();
        $ap2->setIdentifier("fullpension");
        $ap2->setListText("Vollpension (3 Mahlzeiten)");
        $ap2->setPricingBasis("person,night");
        $ap2->setPricingBasisText("/Pers. u. Nacht");
        $ap2->setPositionInList(2);
        $ap2->setHotel($this->getReference('testhotel'));
        $this->addReference('fullpension', $ap2);
        $ap2->setAdditionalProductcategory($this->getReference('Verpflegung'));
        $manager->persist($ap2);
        $manager->flush();

        $ap3 = new AdditionalProduct();
        $ap3->setIdentifier("breakfast");
        $ap3->setListText("Nur Frühstück");
        $ap3->setPricingBasis("person,night");
        $ap3->setPricingBasisText("/Pers. u. Nacht");
        $ap3->setPositionInList(3);
        $ap3->setHotel($this->getReference('testhotel'));
        $this->addReference('breakfast', $ap3);
        $ap3->setAdditionalProductcategory($this->getReference('Verpflegung'));
        $manager->persist($ap3);
        $manager->flush();

        $ap4 = new AdditionalProduct();
        $ap4->setIdentifier("noboarding");
        $ap4->setListText("Ohne Verpflegung");
        $ap4->setPricingBasis("");
        $ap4->setPricingBasisText("");
        $ap4->setPositionInList(4);
        $ap4->setHotel($this->getReference('testhotel'));
        $this->addReference('noboarding', $ap4);
        $ap4->setAdditionalProductcategory($this->getReference('Verpflegung'));
        $manager->persist($ap4);
        $manager->flush();

        $ap5 = new AdditionalProduct();
        $ap5->setIdentifier("champagnebreakfast");
        $ap5->setListText("Sektfrühstück");
        $ap5->setPricingBasis("person,night");
        $ap5->setPricingBasisText("/Pers. u. Nacht");
        $ap5->setPositionInList(1);
        $ap5->setHotel($this->getReference('testhotel'));
        $this->addReference('champagnebreakfast', $ap5);
        $ap5->setAdditionalProductcategory($this->getReference('Specials'));
        $manager->persist($ap5);
        $manager->flush();

        $ap6 = new AdditionalProduct();
        $ap6->setIdentifier("rosesinrooms");
        $ap6->setListText("Rosen auf das Zimmer");
        $ap6->setPricingBasis("");
        $ap6->setPricingBasisText("");
        $ap6->setPositionInList(2);
        $ap6->setHotel($this->getReference('testhotel'));
        $this->addReference('rosesinrooms', $ap6);
        $ap6->setAdditionalProductcategory($this->getReference('Specials'));
        $manager->persist($ap6);
        $manager->flush();

        $ap7 = new AdditionalProduct();
        $ap7->setIdentifier("raftingtour");
        $ap7->setListText("Rafting-Tour");
        $ap7->setPricingBasis("person");
        $ap7->setPricingBasisText("/Person");
        $ap7->setPositionInList(3);
        $ap7->setHotel($this->getReference('testhotel'));
        $this->addReference('raftingtour', $ap7);
        $ap7->setAdditionalProductcategory($this->getReference('Specials'));
        $manager->persist($ap7);
        $manager->flush();
    }

    public function getOrder() {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 3;
    }

}
