<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use AppBundle\Entity\ProductCategory;

class LoadProductCategoryData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {

        $pg1 = new ProductCategory();
        $pg1->setIdentifier("boardings");
        $pg1->setSubMenuText("Verpflegung");
        $pg1->setPositionInSubMenu(1);
        $pg1->setCardinality("1");
        $manager->persist($pg1);
        $manager->flush();
        $this->addReference('Verpflegung', $pg1);
        unset($pg1);

        $pg2 = new ProductCategory();
        $pg2->setIdentifier("specials");
        $pg2->setSubMenuText("Specials (optional)");
        $pg2->setPositionInSubMenu(2);
        $pg2->setCardinality("n");
        $manager->persist($pg2);
        $manager->flush();
        $this->addReference('Specials', $pg2);
        unset($pg2);
    }

    public function getOrder() {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }

}
