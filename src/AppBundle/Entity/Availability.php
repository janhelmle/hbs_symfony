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
    private $id;

    /**
     * @ORM\Column(type="datetime" , nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="smallint" , nullable=true)
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
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
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
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
     * @return integer
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
