<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
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
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $identifier;

    /**
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $displayShort;

    /**
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $displayLong;

    /**
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $pricingBasis;

    /**
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $pricingBasisDisplay;

    /**
     * @ORM\OneToMany(targetEntity="Price", mappedBy="product")
     */
    private $prices;

    public function __construct() {
        $this->prices = new ArrayCollection();
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
     * Set displayShort
     *
     * @param string $displayShort
     *
     * @return Product
     */
    public function setDisplayShort($displayShort)
    {
        $this->displayShort = $displayShort;
    
        return $this;
    }

    /**
     * Get displayShort
     *
     * @return string
     */
    public function getDisplayShort()
    {
        return $this->displayShort;
    }

    /**
     * Set displayLong
     *
     * @param string $displayLong
     *
     * @return Product
     */
    public function setDisplayLong($displayLong)
    {
        $this->displayLong = $displayLong;
    
        return $this;
    }

    /**
     * Get displayLong
     *
     * @return string
     */
    public function getDisplayLong()
    {
        return $this->displayLong;
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
     * Set pricingBasisDisplay
     *
     * @param string $pricingBasisDisplay
     *
     * @return Product
     */
    public function setPricingBasisDisplay($pricingBasisDisplay)
    {
        $this->pricingBasisDisplay = $pricingBasisDisplay;
    
        return $this;
    }

    /**
     * Get pricingBasisDisplay
     *
     * @return string
     */
    public function getPricingBasisDisplay()
    {
        return $this->pricingBasisDisplay;
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
}
