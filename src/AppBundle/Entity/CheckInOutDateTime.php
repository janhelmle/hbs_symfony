<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Exception;
use DateTime;

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
     * @ORM\Column(type="datetime" , nullable=false)
     */
    private $checkInDateTime;

    /**
     * @Assert\DateTime()
     * @ORM\Column(type="datetime" , nullable=false)
     */
    private $checkOutDateTime;

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
    public function setCheckInDateTime($checkInDateTime) {
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
    public function setCheckOutDateTime($checkOutDateTime) {
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
     *
     * @return CheckInOutDateTime
     */
    public function setCheckInOutDateTime($checkInDateTime, $checkOutDateTime) {
        $checkInDateTimeTrimmed = trim($checkInDateTime);
        $checkOutDateTimeTrimmed = trim($checkOutDateTime);

        if (
                !(preg_match('/^(19|20)\d{2}\.(0|1)\d\.[0-3]\d,\s[0-2]\d:[0-5]\d$/', $checkInDateTimeTrimmed)) || // test
                !(preg_match('/^(19|20)\d{2}\.(0|1)\d\.[0-3]\d,\s[0-2]\d:[0-5]\d$/', $checkOutDateTimeTrimmed))
        ) {
            throw new Exception("Error. Malformed request syntax. Please use header keys 'checkInDate' and 'checkOutDate' with values in this form : 'Y.m.d, H:i' , e.g. '2016.04.26, 12:00'");
        }

        $this->checkInDateTime = DateTime::createFromFormat('Y.m.d, H:i', $checkInDateTimeTrimmed);
        $this->checkOutDateTime = DateTime::createFromFormat('Y.m.d, H:i', $checkOutDateTimeTrimmed);

        return $this;
    }

    /**
     * @Assert\IsTrue(message = "Error: Timespan exceeds 365 Days")
     */
    public function isTimespanLegal() {
        if($this->checkInDateTime->diff($this->checkOutDateTime)->days > 365) { return false ; }
        return true;
    }

    /**
     * @Assert\IsTrue(message = "Error: CheckIn time later than CheckOut time")
     */
    public function isCheckOutDateTimeLaterCheckInDateTime() {
        if( ($this->getCheckInDateTime()->diff($this->getCheckOutDateTime())->invert) > 0 ) { return false ; }
        return true;
    }

}
