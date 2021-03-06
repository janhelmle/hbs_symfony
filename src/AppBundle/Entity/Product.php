<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ProductRepository")
 * @ORM\Table(name="product")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discriminator", type="string")
 * @ORM\DiscriminatorMap({"product" = "Product", "roomType" = "RoomType" , "additionalProduct" = "AdditionalProduct"})
 */
abstract class Product {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Assert\Type(type="string")
     * @ORM\Column(type="string" , length=100 , nullable=false , unique=true)
     */
    private $identifier;

    /**
     * @Assert\Type(type="string")
     * @ORM\Column(type="string" , length=100 , nullable=false , unique=true)
     */
    private $listText; // fuer list

    /**
     * @Assert\Type(type="string")
     * @ORM\Column(type="string" , length=100 , nullable=false)
     */
    private $pricingBasis;

    /**
     * @Assert\Type(type="string")
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $pricingBasisText;
    
    /**
     * @Assert\Type(type="bool")
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $enabled;
    
    /**
     * @ORM\OneToMany(targetEntity="Price", mappedBy="product")
     */
    private $prices; // ArrayCollection

    public function __construct() {
        $this->prices = new ArrayCollection();
    }

    /**
     * @ORM\ManyToOne(targetEntity="Hotel", inversedBy="products")
     * @ORM\JoinColumn(name="hotel_id", referencedColumnName="id")
     */
    private $hotel;


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
     * Set identifier
     *
     * @param string $identifier
     *
     * @return Product
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    
        return $this;
    }

    /**
     * Get identifier
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Set listText
     *
     * @param string $listText
     *
     * @return Product
     */
    public function setListText($listText)
    {
        $this->listText = $listText;
    
        return $this;
    }

    /**
     * Get listText
     *
     * @return string
     */
    public function getListText()
    {
        return $this->listText;
    }

    /**
     * Set pricingBasis
     *
     * @param string $pricingBasis
     *
     * @return Product
     */
    public function setPricingBasis($pricingBasis)
    {
        $this->pricingBasis = $pricingBasis;
    
        return $this;
    }

    /**
     * Get pricingBasis
     *
     * @return string
     */
    public function getPricingBasis()
    {
        return $this->pricingBasis;
    }

    /**
     * Set pricingBasisText
     *
     * @param string $pricingBasisText
     *
     * @return Product
     */
    public function setPricingBasisText($pricingBasisText)
    {
        $this->pricingBasisText = $pricingBasisText;
    
        return $this;
    }

    /**
     * Get pricingBasisText
     *
     * @return string
     */
    public function getPricingBasisText()
    {
        return $this->pricingBasisText;
    }

    /**
     * Add price
     *
     * @param \AppBundle\Entity\Price $price
     *
     * @return Product
     */
    public function addPrice(\AppBundle\Entity\Price $price)
    {
        $this->prices[] = $price;
    
        return $this;
    }

    /**
     * Remove price
     *
     * @param \AppBundle\Entity\Price $price
     */
    public function removePrice(\AppBundle\Entity\Price $price)
    {
        $this->prices->removeElement($price);
    }

    /**
     * Get prices
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * Set hotel
     *
     * @param \AppBundle\Entity\Hotel $hotel
     *
     * @return Product
     */
    public function setHotel(\AppBundle\Entity\Hotel $hotel = null)
    {
        $this->hotel = $hotel;
    
        return $this;
    }

    /**
     * Get hotel
     *
     * @return \AppBundle\Entity\Hotel
     */
    public function getHotel()
    {
        return $this->hotel;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return Product
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    
        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }
}
