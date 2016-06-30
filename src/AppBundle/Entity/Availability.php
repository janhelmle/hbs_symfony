<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\AvailabilityRepository")
 * @ORM\Table(name="availability" , indexes={ @ORM\Index(name="date_idx", columns={"date"}) })
 */
class Availability {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Assert\DateTime()
     * @Assert\NotNull()
     * @ORM\Column(type="datetime" , nullable=false)
     */
    private $date;

    /**
     * @Assert\GreaterThanOrEqual(value = 0)
     * @Assert\Type(type="int")
     * @ORM\Column(type="smallint" , nullable=false)
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity="RoomType", inversedBy="availabilities")
     * @ORM\JoinColumn(name="roomtype_id", referencedColumnName="id")
     */
    private $roomType;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Availability
     */
    public function setDate($date) {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Availability
     */
    public function setQuantity($quantity) {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity() {
        return $this->quantity;
    }

    /**
     * Set roomType
     *
     * @param \AppBundle\Entity\RoomType $roomType
     *
     * @return Availability
     */
    public function setRoomType(\AppBundle\Entity\RoomType $roomType = null) {
        $this->roomType = $roomType;

        return $this;
    }

    /**
     * Get roomType
     *
     * @return \AppBundle\Entity\RoomType
     */
    public function getRoomType() {
        return $this->roomType;
    }

    /**
     * @Assert\IsTrue(message = "Error: Quantity greater than Capacity")
     */
    public function isQuantityLegal() {
        if ($this->quantity > $this->roomType->getCapacity()) {
            return false;
        }
        if ($this->quantity < 0) {
            return false;
        }
        return true;
    }

}
