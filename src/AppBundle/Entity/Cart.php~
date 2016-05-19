<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\CartRepository")
 * @ORM\Table(name="cart")
 */
class Cart {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime" , nullable=true)
     */
    private $checkInDate;

    /**
     * @ORM\Column(type="datetime" , nullable=true)
     */
    private $checkOutDate;

    /**
     * @ORM\OneToMany(targetEntity="Item", mappedBy="cart")
     */
    private $items; // ArrayCollection

    public function __construct() {
        $this->items = new ArrayCollection();
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
     * Set checkInDate
     *
     * @param \DateTime $checkInDate
     *
     * @return Cart
     */
    public function setCheckInDate($checkInDate)
    {
        $this->checkInDate = $checkInDate;
    
        return $this;
    }

    /**
     * Get checkInDate
     *
     * @return \DateTime
     */
    public function getCheckInDate()
    {
        return $this->checkInDate;
    }

    /**
     * Set checkOutDate
     *
     * @param \DateTime $checkOutDate
     *
     * @return Cart
     */
    public function setCheckOutDate($checkOutDate)
    {
        $this->checkOutDate = $checkOutDate;
    
        return $this;
    }

    /**
     * Get checkOutDate
     *
     * @return \DateTime
     */
    public function getCheckOutDate()
    {
        return $this->checkOutDate;
    }

    /**
     * Add item
     *
     * @param \AppBundle\Entity\Item $item
     *
     * @return Cart
     */
    public function addItem(\AppBundle\Entity\Item $item)
    {
        $this->items[] = $item;
    
        return $this;
    }

    /**
     * Remove item
     *
     * @param \AppBundle\Entity\Item $item
     */
    public function removeItem(\AppBundle\Entity\Item $item)
    {
        $this->items->removeElement($item);
    }

    /**
     * Get items
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItems()
    {
        return $this->items;
    }
}
