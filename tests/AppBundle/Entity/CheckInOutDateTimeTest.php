<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\CheckInOutDateTime;

//use AppBundle\Entity\RoomType;

class CheckInOutDateTimeTest extends \PHPUnit_Framework_TestCase {

    public function testSetCheckInOutDateTime() {
        $ciodt1 = new CheckInOutDateTime();
        $ciodt1->setCheckInOutDateTime('2099.04.26, 12:00', '2099.04.27, 12:00');
        $this->assertInstanceOf(CheckInOutDateTime::class, $ciodt1);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Error. Malformed request syntax. Please use header keys 'checkInDate' and 'checkOutDate' with values in this form : 'Y.m.d, H:i' , e.g. '2016.04.26, 12:00'
     */
    public function testInvalidArgumentFirstInvalidSecondInvalid() {
        $ciodt1 = new CheckInOutDateTime();
        $ciodt1->setCheckInOutDateTime('', '');
    }

}
