<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="additionalProductCategory")
 */
class AdditionalProductCategory {

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
    private $subMenuText;

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $cardinality;

    /**
     * @ORM\Column(type="smallint" , nullable=true)
     */
    private $positionInSubMenu;

    /**
     * @ORM\OneToMany(targetEntity="AdditionalProduct", mappedBy="additionalProductCategory")
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
     * @return AdditionalProductCategory
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
     * Set subMenuText
     *
     * @param string $subMenuText
     *
     * @return AdditionalProductCategory
     */
    public function setSubMenuText($subMenuText)
    {
        $this->subMenuText = $subMenuText;
    
        return $this;
    }

    /**
     * Get subMenuText
     *
     * @return string
     */
    public function getSubMenuText()
    {
        return $this->subMenuText;
    }

    /**
     * Set cardinality
     *
     * @param string $cardinality
     *
     * @return AdditionalProductCategory
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
     * @return AdditionalProductCategory
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
     * @return AdditionalProductCategory
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
