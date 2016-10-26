<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use DateTime;
use Exception;

/**
 * @ORM\Entity
 * @ORM\Table(name="checkInOutDateTime")
 */
class CheckInOutDateTime {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id; // integer

    /**
     * @Assert\DateTime()
     * @Assert\NotNull()
     * @Assert\NotBlank()
     * @ORM\Column(type="datetime" , nullable=false)
     */
    private $checkInDateTime = null;

    /**
     * @Assert\DateTime()
     * @Assert\NotNull()
     * @Assert\NotBlank()
     * @ORM\Column(type="datetime" , nullable=false)
     */
    private $checkOutDateTime = null;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set checkInDateTime
     *
     * @param \DateTime $checkInDateTime
     *
     * @return CheckInOutDateTime
     */
    public function setCheckInDateTime(DateTime $checkInDateTime) {
        $this->checkInDateTime = $checkInDateTime;

        return $this;
    }

    /**
     * Get checkInDateTime
     *
     * @return \DateTime
     */
    public function getCheckInDateTime() {
        return $this->checkInDateTime;
    }

    /**
     * Set checkOutDateTime
     *
     * @param \DateTime $checkOutDateTime
     *
     * @return CheckInOutDateTime
     */
    public function setCheckOutDateTime(DateTime $checkOutDateTime) {
        $this->checkOutDateTime = $checkOutDateTime;

        return $this;
    }

    /**
     * Get checkOutDateTime
     *
     * @return \DateTime
     */
    public function getCheckOutDateTime() {
        return $this->checkOutDateTime;
    }

    /**
     * Set checkInOutDateTime
     *
     * @param string $checkInDateTime
     * @param string $checkOutDateTime
     *
     * @return CheckInOutDateTime
     */
    public function setCheckInOutDateTime($checkInDateTime = null, $checkOutDateTime = null) { // Input : string or DateTime
        // test type : string or datetime
        if ($checkInDateTime && $checkOutDateTime) {

            if (($checkInDateTime instanceof DateTime) && ($checkOutDateTime instanceof DateTime)) {
                $this->setCheckInDateTime($checkInDateTime);
                $this->setCheckOutDateTime($checkOutDateTime);
            }

            if (is_string($checkInDateTime) && is_string($checkOutDateTime)) {

                $checkInDateTimeTrimmed = trim($checkInDateTime);
                $checkOutDateTimeTrimmed = trim($checkOutDateTime);

                $this->checkInDateTime = DateTime::createFromFormat('Y.m.d, H:i', $checkInDateTimeTrimmed);
                if (DateTime::getLastErrors()["warning_count"] || DateTime::getLastErrors()["error_count"]) {
                    $this->checkInDateTime = null;
                    throw new Exception("Can't parse CheckIn in Header. Example: 'checkInDate:2017.04.26, 12:00'");
                }
                $this->checkOutDateTime = DateTime::createFromFormat('Y.m.d, H:i', $checkOutDateTimeTrimmed);
                if (DateTime::getLastErrors()["warning_count"] || DateTime::getLastErrors()["error_count"]) {
                    $this->checkOutDateTime = null;
                    throw new Exception("Can't parse CheckOut in Header. Example: 'checkOutDate:2017.04.27, 12:00'");
                }
            }


//        if (
//                !(preg_match('/^(19|20)\d{2}\.(0|1)\d\.[0-3]\d,\s[0-2]\d:[0-5]\d$/', $checkInDateTimeTrimmed)) || // e.g. '2016.04.26, 12:00'
//                !(preg_match('/^(19|20)\d{2}\.(0|1)\d\.[0-3]\d,\s[0-2]\d:[0-5]\d$/', $checkOutDateTimeTrimmed))
//        ) {
//            throw new \InvalidArgumentException("Error. Malformed request syntax. Please use header keys 'checkInDate' and 'checkOutDate' with values in this form : 'Y.m.d, H:i' , e.g. '2016.04.26, 12:00'");
//        }
//        if (
//                $checkInDateTimeTrimmed >= $checkOutDateTimeTrimmed
//        ) {
//            throw new \InvalidArgumentException("Error: checkInDate >= checkOutDate. Please try again with the correct settings.");
//        }
        }

        return $this;
    }

//    /**
//     * @Assert\IsTrue()
//     */
//    public function isCheckInDateTimeCorrectType() {
//        if ($this->checkInDateTime) {
//            if (get_class($this->checkInDateTime) == 'DateTime') {
//                return true;
//            }
//        }
//        return false;
//    }
//    public function isTimespanLegal() { // wenn beide datetime
//        if ($this->checkInDateTime->diff($this->checkOutDateTime)->days > 365) {
//            return false;
//        }
//        return true;
//    }
//
//    public function isCheckOutDateTimeLaterCheckInDateTime() { // wenn beide datetime
//        if (($this->checkInDateTime->diff($this->checkOutDateTime)->invert) > 0) {
//            return false;
//        }
//        return true;
//    }
//    public function isCheckInDateTimeEqualOrLaterNow() {
//        $now = new DateTime('now');
//        if ($this->checkInDateTime < $now) {
//            return false;
//        }
//        return true;
//    }
//
//    public function isCheckOutDateTimeEqualOrLaterNow() {
//        $now = new DateTime('now');
//        if ($this->checkOutDateTime < $now) {
//            return false;
//        }
//        return true;
//    }
//
//    public function getGroupSequence()
//    {
//        $groups = array('CheckInOutDateTime');
//
//        if ($this->isStrict()) {
//            $groups[] = 'Strict';
//        }
//
//        return $groups;
//    }

    /**
     * @Assert\Callback
     */
    public function validate(ExecutionContextInterface $context, $payload = NULL) {
        if (is_null($this->checkInDateTime)) { // ist NULL
            $context->buildViolation('checkInDateTime is NULL')
                    ->atPath('checkInDateTime')
                    ->addViolation();
        }

        if (is_null($this->checkOutDateTime)) { // ist NULL
            $context->buildViolation('checkOutDateTime is NULL')
                    ->atPath('checkOutDateTime')
                    ->addViolation();
        }

        if ($this->checkInDateTime && $this->checkOutDateTime) { // Typen Korrekt
            // checkIn >= checkOut
            if ($this->checkInDateTime >= $this->checkOutDateTime) {
                $context->buildViolation('CheckOut earlier or equal CheckIn')
                        ->atPath('checkOutDateTime')
                        ->addViolation();
            }
            // Timespan > 365 Tage
            if ($this->checkInDateTime->diff($this->checkOutDateTime)->days > 365) {
                $context->buildViolation('Timespan Too Large')
                        ->atPath('checkOutDateTime')
                        ->addViolation();
            }
            // checkIn < now
            $now = new DateTime('now');
            if ($this->checkInDateTime < $now) {
                $context->buildViolation('CheckIn earlier than now')
                        ->atPath('checkInDateTime')
                        ->addViolation();
            }
            // checkOut < now
            if ($this->checkOutDateTime < $now) { // checkOut < now
                $context->buildViolation('CheckOut earlier than now')
                        ->atPath('checkOutDateTime')
                        ->addViolation();
            }
            // Timespan < 1 Tag
            if (
                    ($this->checkInDateTime->diff($this->checkOutDateTime)->days < 1) &&
                    ($this->checkInDateTime->diff($this->checkOutDateTime)->days >= 0)
            ) {
                $context->buildViolation('Timespan Too Small')
                        ->atPath('checkOutDateTime')
                        ->addViolation();
            }
            // In > 2099
            if ($this->checkInDateTime > new DateTime("2099-12-31 23:59:59.000000")) { //
                $context->buildViolation('CheckIn Later 2099-12-31')
                        ->atPath('checkInDateTime')
                        ->addViolation();
            }
            // Out > 2099
            if ($this->checkOutDateTime > new DateTime("2099-12-31 23:59:59.000000")) { //
                $context->buildViolation('CheckOut Later 2099-12-31')
                        ->atPath('checkOutDateTime')
                        ->addViolation();
            }
        }
    }

}
