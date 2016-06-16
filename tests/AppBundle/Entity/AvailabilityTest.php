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

        $av3 = new Availability();
        $rt3 = new RoomType();
        $rt3->setCapacity(10);
        $av3->setQuantity(-1);
        $av3->setRoomType($rt3);
        $this->assertEquals(false, $av3->isQuantityLegal());

        $av4 = new Availability();
        $rt4 = new RoomType();
        $rt4->setCapacity(10);
        $av4->setQuantity(1);
        $av4->setRoomType($rt4);
        $this->assertEquals(true, $av4->isQuantityLegal());
    }

}
