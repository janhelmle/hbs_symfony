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
        $rt1->setDisplayShort("Einzel");
        $rt1->setDisplayLong("Einzelzimmer");
        $rt1->setPricingBasis("night");
        $rt1->setPricingBasisDisplay("/Nacht");
        $rt1->setCapacity(5);
        $rt1->setQuantityOfPersons(1);
        $rt1->setPositionInSubMenu(1);
        $this->addReference('singleroom', $rt1);
        $manager->persist($rt1);
        $manager->flush();
        unset($rt1);

        $rt2 = new RoomType();
        $rt2->setIdentifier("doubleroom");
        $rt2->setDisplayShort("Doppel");
        $rt2->setDisplayLong("Doppelzimmer");
        $rt2->setPricingBasis("night");
        $rt2->setPricingBasisDisplay("/Nacht");
        $rt2->setCapacity(6);
        $rt2->setQuantityOfPersons(2);
        $rt2->setPositionInSubMenu(2);
        $this->addReference('doubleroom', $rt2);
        $manager->persist($rt2);
        $manager->flush();
        unset($rt2);

        $rt3 = new RoomType();
        $rt3->setIdentifier("twinroom");
        $rt3->setDisplayShort("Zweibett");
        $rt3->setDisplayLong("Zweibettzimmer");
        $rt3->setPricingBasis("night");
        $rt3->setPricingBasisDisplay("/Nacht");
        $rt3->setCapacity(7);
        $rt3->setQuantityOfPersons(2);
        $rt3->setPositionInSubMenu(3);
        $this->addReference('twinroom', $rt3);
        $manager->persist($rt3);
        $manager->flush();
        unset($rt3);

        $rt4 = new RoomType();
        $rt4->setIdentifier("tripleroom");
        $rt4->setDisplayShort("Dreibett");
        $rt4->setDisplayLong("Dreibettzimmer");
        $rt4->setPricingBasis("night");
        $rt4->setPricingBasisDisplay("/Nacht");
        $rt4->setCapacity(8);
        $rt4->setQuantityOfPersons(3);
        $rt4->setPositionInSubMenu(4);
        $this->addReference('tripleroom', $rt4);
        $manager->persist($rt4);
        $manager->flush();
        unset($rt4);

        $rt5 = new RoomType();
        $rt5->setIdentifier("familyroom");
        $rt5->setDisplayShort("Familie");
        $rt5->setDisplayLong("Familien-/Vierbettzimmer");
        $rt5->setPricingBasis("night");
        $rt5->setPricingBasisDisplay("/Nacht");
        $rt5->setCapacity(4);
        $rt5->setQuantityOfPersons(4);
        $rt5->setPositionInSubMenu(5);
        $this->addReference('familyroom', $rt5);
        $manager->persist($rt5);
        $manager->flush();
        unset($rt5);

        $rt6 = new RoomType();
        $rt6->setIdentifier("apartmentsingle");
        $rt6->setDisplayShort("Apartm. EZ");
        $rt6->setDisplayLong("Apartment als Einzelzimmer");
        $rt6->setPricingBasis("night");
        $rt6->setPricingBasisDisplay("/Nacht");
        $rt6->setCapacity(3);
        $rt6->setQuantityOfPersons(1);
        $rt6->setPositionInSubMenu(6);
        $this->addReference('apartmentsingle', $rt6);
        $manager->persist($rt6);
        $manager->flush();
        unset($rt6);

        $rt7 = new RoomType();
        $rt7->setIdentifier("apartmentdouble");
        $rt7->setDisplayShort("Apartm. DZ");
        $rt7->setDisplayLong("Apartment als Doppelzimmer");
        $rt7->setPricingBasis("night");
        $rt7->setPricingBasisDisplay("/Nacht");
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
