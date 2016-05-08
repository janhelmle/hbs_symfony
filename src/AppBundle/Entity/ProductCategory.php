<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="productcategory")
 */
class ProductCategory {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id; // integer

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $identifier;

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $display;

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $cardinality;

    /**
     * @ORM\Column(type="smallint" , nullable=true)
     */
    private $positionInSubMenu;

    /**
     * @ORM\OneToMany(targetEntity="AdditionalProduct", mappedBy="productcategory")
     */
    private $additionalProducts;

    public function __construct() {

        $this->additionalProducts = new ArrayCollection();
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
     * @return ProductCategory
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
     * Set display
     *
     * @param string $display
     *
     * @return ProductCategory
     */
    public function setDisplay($display)
    {
        $this->display = $display;
    
        return $this;
    }

    /**
     * Get display
     *
     * @return string
     */
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * Set cardinality
     *
     * @param string $cardinality
     *
     * @return ProductCategory
     */
    public function setCardinality($cardinality)
    {
        $this->cardinality = $cardinality;
    
        return $this;
    }

    /**
     * Get cardinality
     *
     * @return string
     */
    public function getCardinality()
    {
        return $this->cardinality;
    }

    /**
     * Set positionInSubMenu
     *
     * @param integer $positionInSubMenu
     *
     * @return ProductCategory
     */
    public function setPositionInSubMenu($positionInSubMenu)
    {
        $this->positionInSubMenu = $positionInSubMenu;
    
        return $this;
    }

    /**
     * Get positionInSubMenu
     *
     * @return integer
     */
    public function getPositionInSubMenu()
    {
        return $this->positionInSubMenu;
    }

    /**
     * Add additionalProduct
     *
     * @param \AppBundle\Entity\AdditionalProduct $additionalProduct
     *
     * @return ProductCategory
     */
    public function addAdditionalProduct(\AppBundle\Entity\AdditionalProduct $additionalProduct)
    {
        $this->additionalProducts[] = $additionalProduct;
    
        return $this;
    }

    /**
     * Remove additionalProduct
     *
     * @param \AppBundle\Entity\AdditionalProduct $additionalProduct
     */
    public function removeAdditionalProduct(\AppBundle\Entity\AdditionalProduct $additionalProduct)
    {
        $this->additionalProducts->removeElement($additionalProduct);
    }

    /**
     * Get additionalProducts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdditionalProducts()
    {
        return $this->additionalProducts;
    }
}
