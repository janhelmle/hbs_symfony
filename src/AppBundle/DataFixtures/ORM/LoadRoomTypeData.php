<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use AppBundle\Entity\RoomType;

class LoadRoomTypeData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {

        $rt1 = new RoomType();
        $rt1->setIdentifier("singleroom");
        $rt1->setSubMenuText("Einzel");
        $rt1->setListText("Einzelzimmer");
        $rt1->setPricingBasis("night");
        $rt1->setPricingBasisText("/Nacht");
        $rt1->setCapacity(5);
        $rt1->setQuantityOfPersons(1);
        $rt1->setPositionInSubMenu(1);
        $this->addReference('singleroom', $rt1);
        $manager->persist($rt1);
        $manager->flush();
        unset($rt1);

        $rt2 = new RoomType();
        $rt2->setIdentifier("doubleroom");
        $rt2->setSubMenuText("Doppel");
        $rt2->setListText("Doppelzimmer");
        $rt2->setPricingBasis("night");
        $rt2->setPricingBasisText("/Nacht");
        $rt2->setCapacity(6);
        $rt2->setQuantityOfPersons(2);
        $rt2->setPositionInSubMenu(2);
        $this->addReference('doubleroom', $rt2);
        $manager->persist($rt2);
        $manager->flush();
        unset($rt2);

        $rt3 = new RoomType();
        $rt3->setIdentifier("twinroom");
        $rt3->setSubMenuText("Zweibett");
        $rt3->setListText("Zweibettzimmer");
        $rt3->setPricingBasis("night");
        $rt3->setPricingBasisText("/Nacht");
        $rt3->setCapacity(7);
        $rt3->setQuantityOfPersons(2);
        $rt3->setPositionInSubMenu(3);
        $this->addReference('twinroom', $rt3);
        $manager->persist($rt3);
        $manager->flush();
        unset($rt3);

        $rt4 = new RoomType();
        $rt4->setIdentifier("tripleroom");
        $rt4->setSubMenuText("Dreibett");
        $rt4->setListText("Dreibettzimmer");
        $rt4->setPricingBasis("night");
        $rt4->setPricingBasisText("/Nacht");
        $rt4->setCapacity(8);
        $rt4->setQuantityOfPersons(3);
        $rt4->setPositionInSubMenu(4);
        $this->addReference('tripleroom', $rt4);
        $manager->persist($rt4);
        $manager->flush();
        unset($rt4);

        $rt5 = new RoomType();
        $rt5->setIdentifier("familyroom");
        $rt5->setSubMenuText("Familie");
        $rt5->setListText("Familien-/Vierbettzimmer");
        $rt5->setPricingBasis("night");
        $rt5->setPricingBasisText("/Nacht");
        $rt5->setCapacity(4);
        $rt5->setQuantityOfPersons(4);
        $rt5->setPositionInSubMenu(5);
        $this->addReference('familyroom', $rt5);
        $manager->persist($rt5);
        $manager->flush();
        unset($rt5);

        $rt6 = new RoomType();
        $rt6->setIdentifier("apartmentsingle");
        $rt6->setSubMenuText("Apartm. EZ");
        $rt6->setListText("Apartment als Einzelzimmer");
        $rt6->setPricingBasis("night");
        $rt6->setPricingBasisText("/Nacht");
        $rt6->setCapacity(3);
        $rt6->setQuantityOfPersons(1);
        $rt6->setPositionInSubMenu(6);
        $this->addReference('apartmentsingle', $rt6);
        $manager->persist($rt6);
        $manager->flush();
        unset($rt6);

        $rt7 = new RoomType();
        $rt7->setIdentifier("apartmentdouble");
        $rt7->setSubMenuText("Apartm. DZ");
        $rt7->setListText("Apartment als Doppelzimmer");
        $rt7->setPricingBasis("night");
        $rt7->setPricingBasisText("/Nacht");
        $rt7->setCapacity(2);
        $rt7->setQuantityOfPersons(2);
        $rt7->setPositionInSubMenu(7);
        $this->addReference('apartmentdouble', $rt7);
        $manager->persist($rt7);
        $manager->flush();
        unset($rt7);
    }

    public function getOrder() {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 5;
    }

}
