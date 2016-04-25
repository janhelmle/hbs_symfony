<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="availability")
 */
class Availability {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id; // integer

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity="RoomType", inversedBy="availabilities")
     * @ORM\JoinColumn(name="availability_id", referencedColumnName="id")
     */
    private $roomType;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param string $date
     *
     * @return Availability
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set quantity
     *
     * @param string $quantity
     *
     * @return Availability
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    
        return $this;
    }

    /**
     * Get quantity
     *
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set roomType
     *
     * @param \AppBundle\Entity\RoomType $roomType
     *
     * @return Availability
     */
    public function setRoomType(\AppBundle\Entity\RoomType $roomType = null)
    {
        $this->roomType = $roomType;
    
        return $this;
    }

    /**
     * Get roomType
     *
     * @return \AppBundle\Entity\RoomType
     */
    public function getRoomType()
    {
        return $this->roomType;
    }
}
