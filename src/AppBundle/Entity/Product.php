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
    private $textList; // fuer list

    /**
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $pricingBasis;

    /**
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
    private $pricingBasisText;

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
     * Set textList
     *
     * @param string $textList
     *
     * @return Product
     */
    public function setTextList($textList)
    {
        $this->textList = $textList;
    
        return $this;
    }

    /**
     * Get textList
     *
     * @return string
     */
    public function getTextList()
    {
        return $this->textList;
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
}
