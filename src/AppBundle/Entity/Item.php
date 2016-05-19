<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="item")
 */
class Item {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $roomTypeIdentifier;

    /**
     * @ORM\Column(type="smallint" , nullable=true)
     */
    private $roomTypeQuantity; // fuer list

    /**
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $boardingIdentifier;
    
    /**
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $specialIdentifier;
    
    /**
     * @ORM\ManyToOne(targetEntity="Cart", inversedBy="items")
     * @ORM\JoinColumn(name="cart_id", referencedColumnName="id")
     */
    private $cart;
    

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
     * Set roomTypeIdentifier
     *
     * @param string $roomTypeIdentifier
     *
     * @return Item
     */
    public function setRoomTypeIdentifier($roomTypeIdentifier)
    {
        $this->roomTypeIdentifier = $roomTypeIdentifier;
    
        return $this;
    }

    /**
     * Get roomTypeIdentifier
     *
     * @return string
     */
    public function getRoomTypeIdentifier()
    {
        return $this->roomTypeIdentifier;
    }

    /**
     * Set roomTypeQuantity
     *
     * @param integer $roomTypeQuantity
     *
     * @return Item
     */
    public function setRoomTypeQuantity($roomTypeQuantity)
    {
        $this->roomTypeQuantity = $roomTypeQuantity;
    
        return $this;
    }

    /**
     * Get roomTypeQuantity
     *
     * @return integer
     */
    public function getRoomTypeQuantity()
    {
        return $this->roomTypeQuantity;
    }

    /**
     * Set boardingIdentifier
     *
     * @param string $boardingIdentifier
     *
     * @return Item
     */
    public function setBoardingIdentifier($boardingIdentifier)
    {
        $this->boardingIdentifier = $boardingIdentifier;
    
        return $this;
    }

    /**
     * Get boardingIdentifier
     *
     * @return string
     */
    public function getBoardingIdentifier()
    {
        return $this->boardingIdentifier;
    }

    /**
     * Set specialIdentifier
     *
     * @param string $specialIdentifier
     *
     * @return Item
     */
    public function setSpecialIdentifier($specialIdentifier)
    {
        $this->specialIdentifier = $specialIdentifier;
    
        return $this;
    }

    /**
     * Get specialIdentifier
     *
     * @return string
     */
    public function getSpecialIdentifier()
    {
        return $this->specialIdentifier;
    }

    /**
     * Set cart
     *
     * @param \AppBundle\Entity\Cart $cart
     *
     * @return Item
     */
    public function setCart(\AppBundle\Entity\Cart $cart = null)
    {
        $this->cart = $cart;
    
        return $this;
    }

    /**
     * Get cart
     *
     * @return \AppBundle\Entity\Cart
     */
    public function getCart()
    {
        return $this->cart;
    }
}
