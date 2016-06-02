<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\AdditionalProductRepository")
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
     * @ORM\Column(type="smallint" , nullable=true)
     */
    private $positionInList;

    /**
     * @ORM\ManyToOne(targetEntity="AdditionalProductCategory", inversedBy="additionalProducts")
     * @ORM\JoinColumn(name="additionalproductcategory_id", referencedColumnName="id")
     */
    private $additionalproductcategory;

    /**
     * Set positionInList
     *
     * @param integer $positionInList
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
     * @return integer
     */
    public function getPositionInList()
    {
        return $this->positionInList;
    }

    /**
     * Set additionalproductcategory
     *
     * @param \AppBundle\Entity\AdditionalProductCategory $additionalproductcategory
     *
     * @return AdditionalProduct
     */
    public function setAdditionalproductcategory(\AppBundle\Entity\AdditionalProductCategory $additionalproductcategory = null)
    {
        $this->additionalproductcategory = $additionalproductcategory;
    
        return $this;
    }

    /**
     * Get additionalproductcategory
     *
     * @return \AppBundle\Entity\AdditionalProductCategory
     */
    public function getAdditionalproductcategory()
    {
        return $this->additionalproductcategory;
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
}
