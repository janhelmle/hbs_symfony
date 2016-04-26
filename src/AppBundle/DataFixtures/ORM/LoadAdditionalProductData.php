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
        $ap1->setDisplayLong("Halbpension (mit Frühstück)");
        $ap1->setPricingBasis("person,night");
        $ap1->setPricingBasisDisplay("/Pers. u. Nacht");
        $ap1->setPositionInList(1);
        $ap1->setProductcategory($this->getReference('Verpflegung'));
        $manager->persist($ap1);
        $manager->flush();

        $ap2 = new AdditionalProduct();
        $ap2->setIdentifier("fullpension");
        $ap2->setDisplayLong("Vollpension (3 Mahlzeiten)");
        $ap2->setPricingBasis("person,night");
        $ap2->setPricingBasisDisplay("/Pers. u. Nacht");
        $ap2->setPositionInList(2);
        $ap2->setProductcategory($this->getReference('Verpflegung'));
        $manager->persist($ap2);
        $manager->flush();

        $ap3 = new AdditionalProduct();
        $ap3->setIdentifier("breakfast");
        $ap3->setDisplayLong("Nur Frühstück");
        $ap3->setPricingBasis("person,night");
        $ap3->setPricingBasisDisplay("/Pers. u. Nacht");
        $ap3->setPositionInList(3);
        $ap3->setProductcategory($this->getReference('Verpflegung'));
        $manager->persist($ap3);
        $manager->flush();

        $ap4 = new AdditionalProduct();
        $ap4->setIdentifier("noboarding");
        $ap4->setDisplayLong("Ohne Verpflegung");
        $ap4->setPricingBasis("person,night");
        $ap4->setPricingBasisDisplay("");
        $ap4->setPositionInList(4);
        $ap4->setProductcategory($this->getReference('Verpflegung'));
        $manager->persist($ap4);
        $manager->flush();

        $ap5 = new AdditionalProduct();
        $ap5->setIdentifier("champagnebreakfast");
        $ap5->setDisplayLong("Sektfrühstück");
        $ap5->setPricingBasis("person,night");
        $ap5->setPricingBasisDisplay("/Pers. u. Nacht");
        $ap5->setPositionInList(1);
        $ap5->setProductcategory($this->getReference('Specials'));
        $manager->persist($ap5);
        $manager->flush();

        $ap6 = new AdditionalProduct();
        $ap6->setIdentifier("rosesinrooms");
        $ap6->setDisplayLong("Rosen auf das Zimmer");
        $ap6->setPricingBasis("");
        $ap6->setPricingBasisDisplay("");
        $ap6->setPositionInList(2);
        $ap6->setProductcategory($this->getReference('Specials'));
        $manager->persist($ap6);
        $manager->flush();

        $ap7 = new AdditionalProduct();
        $ap7->setIdentifier("raftingtour");
        $ap7->setDisplayLong("Rafting-Tour");
        $ap7->setPricingBasis("person");
        $ap7->setPricingBasisDisplay("/Person");
        $ap7->setPositionInList(3);
        $ap7->setProductcategory($this->getReference('Specials'));
        $manager->persist($ap7);
        $manager->flush();
    }

    public function getOrder() {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }

}
