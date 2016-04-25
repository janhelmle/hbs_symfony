<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="additionalProduct")
 */
class AdditionalProduct extends Product {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id; // integer

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $positionInList;

    /**
     * @ORM\ManyToOne(targetEntity="ProductCategory", inversedBy="additionalProducts")
     * @ORM\JoinColumn(name="additionalProduct_id", referencedColumnName="id")
     */
    private $productcategory;

    

    

    /**
     * Set positionInList
     *
     * @param string $positionInList
     *
     * @return AdditionalProduct
     */
    public function setPositionInList($positionInList)
    {
        $this->positionInList = $positionInList;
    
        return $this;
    }

    /**
     * Get positionInList
     *
     * @return string
     */
    public function getPositionInList()
    {
        return $this->positionInList;
    }

    /**
     * Set productcategory
     *
     * @param \AppBundle\Entity\ProductCategory $productcategory
     *
     * @return AdditionalProduct
     */
    public function setProductcategory(\AppBundle\Entity\ProductCategory $productcategory = null)
    {
        $this->productcategory = $productcategory;
    
        return $this;
    }

    /**
     * Get productcategory
     *
     * @return \AppBundle\Entity\ProductCategory
     */
    public function getProductcategory()
    {
        return $this->productcategory;
    }
}
