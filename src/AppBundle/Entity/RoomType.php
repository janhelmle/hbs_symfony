<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="roomType")
 */
class RoomType extends Product {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id; // integer

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $capacity;

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $quantityOfPersons;

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $positionInSubMenu;

    /**
     * @ORM\OneToMany(targetEntity="Availability", mappedBy="roomType")
     */
    private $availabilities;

    public function __construct() {
        parent::__construct();
        $this->availabilities = new ArrayCollection();
    }


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
     * Set capacity
     *
     * @param string $capacity
     *
     * @return RoomType
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    
        return $this;
    }

    /**
     * Get capacity
     *
     * @return string
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set quantityOfPersons
     *
     * @param string $quantityOfPersons
     *
     * @return RoomType
     */
    public function setQuantityOfPersons($quantityOfPersons)
    {
        $this->quantityOfPersons = $quantityOfPersons;
    
        return $this;
    }

    /**
     * Get quantityOfPersons
     *
     * @return string
     */
    public function getQuantityOfPersons()
    {
        return $this->quantityOfPersons;
    }

    /**
     * Set positionInSubMenu
     *
     * @param string $positionInSubMenu
     *
     * @return RoomType
     */
    public function setPositionInSubMenu($positionInSubMenu)
    {
        $this->positionInSubMenu = $positionInSubMenu;
    
        return $this;
    }

    /**
     * Get positionInSubMenu
     *
     * @return string
     */
    public function getPositionInSubMenu()
    {
        return $this->positionInSubMenu;
    }

    /**
     * Add availability
     *
     * @param \AppBundle\Entity\Availability $availability
     *
     * @return RoomType
     */
    public function addAvailability(\AppBundle\Entity\Availability $availability)
    {
        $this->availabilities[] = $availability;
    
        return $this;
    }

    /**
     * Remove availability
     *
     * @param \AppBundle\Entity\Availability $availability
     */
    public function removeAvailability(\AppBundle\Entity\Availability $availability)
    {
        $this->availabilities->removeElement($availability);
    }

    /**
     * Get availabilities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAvailabilities()
    {
        return $this->availabilities;
    }
}
