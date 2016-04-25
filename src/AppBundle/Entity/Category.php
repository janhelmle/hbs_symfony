<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="category")
 */
class Category {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id; // integer

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $positionInSubMenu;

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $cardinality;

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $display;

    /**
     * @ORM\OneToMany(targetEntity="AdditionalProduct", mappedBy="category")
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
     * Set positionInSubMenu
     *
     * @param string $positionInSubMenu
     *
     * @return Category
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
     * Set cardinality
     *
     * @param string $cardinality
     *
     * @return Category
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
     * Set display
     *
     * @param string $display
     *
     * @return Category
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
     * Add additionalProduct
     *
     * @param \AppBundle\Entity\AdditionalProduct $additionalProduct
     *
     * @return Category
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
