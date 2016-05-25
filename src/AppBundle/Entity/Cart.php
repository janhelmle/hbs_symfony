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
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $userFirstName;

    /**
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $userLastName;

    /**
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $userBirthDate;

    /**
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $userAddress;

    /**
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $userPlz;
    
    /**
     * @ORM\Column(type="string" , length=200 , nullable=true)
     */
    private $userEMail;

    /**
     * @ORM\Column(type="boolean" , nullable=true)
     */
    private $alternateCheck;

    /**
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $userFirstNameAlternate;

    /**
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $userLastNameAlternate;

    /**
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $userBirthDateAlternate;

    /**
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $userAddressAlternate;

    /**
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $userPlzAlternate;
    
    /**
     * @ORM\Column(type="string" , length=200 , nullable=true)
     */
    private $userEMailAlternate;

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
     * Set userFirstName
     *
     * @param string $userFirstName
     *
     * @return Cart
     */
    public function setUserFirstName($userFirstName)
    {
        $this->userFirstName = $userFirstName;
    
        return $this;
    }

    /**
     * Get userFirstName
     *
     * @return string
     */
    public function getUserFirstName()
    {
        return $this->userFirstName;
    }

    /**
     * Set userLastName
     *
     * @param string $userLastName
     *
     * @return Cart
     */
    public function setUserLastName($userLastName)
    {
        $this->userLastName = $userLastName;
    
        return $this;
    }

    /**
     * Get userLastName
     *
     * @return string
     */
    public function getUserLastName()
    {
        return $this->userLastName;
    }

    /**
     * Set userBirthDate
     *
     * @param string $userBirthDate
     *
     * @return Cart
     */
    public function setUserBirthDate($userBirthDate)
    {
        $this->userBirthDate = $userBirthDate;
    
        return $this;
    }

    /**
     * Get userBirthDate
     *
     * @return string
     */
    public function getUserBirthDate()
    {
        return $this->userBirthDate;
    }

    /**
     * Set userAddress
     *
     * @param string $userAddress
     *
     * @return Cart
     */
    public function setUserAddress($userAddress)
    {
        $this->userAddress = $userAddress;
    
        return $this;
    }

    /**
     * Get userAddress
     *
     * @return string
     */
    public function getUserAddress()
    {
        return $this->userAddress;
    }

    /**
     * Set userPlz
     *
     * @param string $userPlz
     *
     * @return Cart
     */
    public function setUserPlz($userPlz)
    {
        $this->userPlz = $userPlz;
    
        return $this;
    }

    /**
     * Get userPlz
     *
     * @return string
     */
    public function getUserPlz()
    {
        return $this->userPlz;
    }

    /**
     * Set userEMail
     *
     * @param string $userEMail
     *
     * @return Cart
     */
    public function setUserEMail($userEMail)
    {
        $this->userEMail = $userEMail;
    
        return $this;
    }

    /**
     * Get userEMail
     *
     * @return string
     */
    public function getUserEMail()
    {
        return $this->userEMail;
    }

    /**
     * Set alternateCheck
     *
     * @param boolean $alternateCheck
     *
     * @return Cart
     */
    public function setAlternateCheck($alternateCheck)
    {
        $this->alternateCheck = $alternateCheck;
    
        return $this;
    }

    /**
     * Get alternateCheck
     *
     * @return boolean
     */
    public function getAlternateCheck()
    {
        return $this->alternateCheck;
    }

    /**
     * Set userFirstNameAlternate
     *
     * @param string $userFirstNameAlternate
     *
     * @return Cart
     */
    public function setUserFirstNameAlternate($userFirstNameAlternate)
    {
        $this->userFirstNameAlternate = $userFirstNameAlternate;
    
        return $this;
    }

    /**
     * Get userFirstNameAlternate
     *
     * @return string
     */
    public function getUserFirstNameAlternate()
    {
        return $this->userFirstNameAlternate;
    }

    /**
     * Set userLastNameAlternate
     *
     * @param string $userLastNameAlternate
     *
     * @return Cart
     */
    public function setUserLastNameAlternate($userLastNameAlternate)
    {
        $this->userLastNameAlternate = $userLastNameAlternate;
    
        return $this;
    }

    /**
     * Get userLastNameAlternate
     *
     * @return string
     */
    public function getUserLastNameAlternate()
    {
        return $this->userLastNameAlternate;
    }

    /**
     * Set userBirthDateAlternate
     *
     * @param string $userBirthDateAlternate
     *
     * @return Cart
     */
    public function setUserBirthDateAlternate($userBirthDateAlternate)
    {
        $this->userBirthDateAlternate = $userBirthDateAlternate;
    
        return $this;
    }

    /**
     * Get userBirthDateAlternate
     *
     * @return string
     */
    public function getUserBirthDateAlternate()
    {
        return $this->userBirthDateAlternate;
    }

    /**
     * Set userAddressAlternate
     *
     * @param string $userAddressAlternate
     *
     * @return Cart
     */
    public function setUserAddressAlternate($userAddressAlternate)
    {
        $this->userAddressAlternate = $userAddressAlternate;
    
        return $this;
    }

    /**
     * Get userAddressAlternate
     *
     * @return string
     */
    public function getUserAddressAlternate()
    {
        return $this->userAddressAlternate;
    }

    /**
     * Set userPlzAlternate
     *
     * @param string $userPlzAlternate
     *
     * @return Cart
     */
    public function setUserPlzAlternate($userPlzAlternate)
    {
        $this->userPlzAlternate = $userPlzAlternate;
    
        return $this;
    }

    /**
     * Get userPlzAlternate
     *
     * @return string
     */
    public function getUserPlzAlternate()
    {
        return $this->userPlzAlternate;
    }

    /**
     * Set userEMailAlternate
     *
     * @param string $userEMailAlternate
     *
     * @return Cart
     */
    public function setUserEMailAlternate($userEMailAlternate)
    {
        $this->userEMailAlternate = $userEMailAlternate;
    
        return $this;
    }

    /**
     * Get userEMailAlternate
     *
     * @return string
     */
    public function getUserEMailAlternate()
    {
        return $this->userEMailAlternate;
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
