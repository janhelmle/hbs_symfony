<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Availability;
use AppBundle\Entity\RoomType;

class AvailabilityTest extends \PHPUnit_Framework_TestCase {

    public function testIsQuantityLegal() {

        $av1 = new Availability();
        $rt1 = new RoomType();
        $rt1->setCapacity(10);
        $av1->setQuantity(9);
        $av1->setRoomType($rt1);

        $this->assertEquals(true, $av1->isQuantityLegal());


        $av2 = new Availability();
        $rt2 = new RoomType();
        $rt2->setCapacity(10);
        $av2->setQuantity(11);
        $av2->setRoomType($rt2);

        $this->assertEquals(false, $av2->isQuantityLegal());
    }

}
