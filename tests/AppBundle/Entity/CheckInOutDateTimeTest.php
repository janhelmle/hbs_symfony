<?php

namespace Tests\AppBundle\Entity;

use Symfony\Component\Validator\Validation;
use AppBundle\Entity\CheckInOutDateTime;
use DateTime;
use DateInterval;

class CheckInOutDateTimeTest extends \PHPUnit_Framework_TestCase {

    public function testCheckInStringValidCheckOutStringValid() {
        $ciodt1 = new CheckInOutDateTime();
        $ciodt1->setCheckInOutDateTime('2099.04.26, 12:00', '2099.04.27, 12:00');
        $this->assertInstanceOf(CheckInOutDateTime::class, $ciodt1);
    }

    public function testCheckInDateTimeValidCheckOutDateTimeValid() {
        $ciodt1 = new CheckInOutDateTime();
        $in = new DateTime('now');
        $out = (new DateTime('now'))->add(new DateInterval('P7D')); // 1 Week
        $ciodt1->setCheckInOutDateTime($in, $out);
        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
        $errors = $validator->validate($ciodt1);
        $this->assertEquals(0, count($errors));
    }

    public function testCheckInDateTimeEqualsCheckOutDateTime() {
        $ciodt1 = new CheckInOutDateTime();
        $in = new DateTime('now');
        $out = new DateTime('now');
        $ciodt1->setCheckInOutDateTime($in, $out);
        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
        $errors = $validator->validate($ciodt1);
        $this->assertGreaterThan(0, count($errors));
    }

    public function testCheckInDateTimeLaterCheckOutDateTime() {
        $ciodt1 = new CheckInOutDateTime();
        $in = (new DateTime('now'))->add(new DateInterval('P7D')); // 1 Week
        $out = new DateTime('now');
        $ciodt1->setCheckInOutDateTime($in, $out);
        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
        $errors = $validator->validate($ciodt1);
        $this->assertGreaterThan(0, count($errors));
    }

    public function testCheckInDateTimeEarlierNowCheckOutDateTimeValid() {
        $ciodt1 = new CheckInOutDateTime();
        $in = (new DateTime('now'))->sub(new DateInterval('P7D')); // 1 Week
        $out = new DateTime('now');
        $ciodt1->setCheckInOutDateTime($in, $out);
        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
        $errors = $validator->validate($ciodt1);
        $this->assertGreaterThan(0, count($errors));
    }

    public function testCheckInNullCheckOutNull() {
        $ciodt1 = new CheckInOutDateTime();
        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
        $errors = $validator->validate($ciodt1);
        $this->assertGreaterThan(0, count($errors));
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testCheckInNullCheckOutWrongType() {
        $ciodt1 = new CheckInOutDateTime();
        $ciodt1->setCheckOutDateTime('invalid');
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testCheckInWrongTypeCheckOutNull() {
        $ciodt1 = new CheckInOutDateTime();
        $ciodt1->setCheckInDateTime('invalid');
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testCheckInWrongTypeCheckOutWrongType() {
        $ciodt1 = new CheckInOutDateTime();
        $ciodt1->setCheckInDateTime('invalid');
        $ciodt1->setCheckOutDateTime('invalid');
    }

}
