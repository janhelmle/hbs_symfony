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
     * @ORM\JoinColumn(name="additionalProductCategory_id", referencedColumnName="id")
     */
    private $additionalProductCategory;


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
     * Set additionalProductCategory
     *
     * @param \AppBundle\Entity\AdditionalProductCategory $additionalProductCategory
     *
     * @return AdditionalProduct
     */
    public function setAdditionalProductCategory(\AppBundle\Entity\AdditionalProductCategory $additionalProductCategory = null)
    {
        $this->additionalProductCategory = $additionalProductCategory;
    
        return $this;
    }

    /**
     * Get additionalProductCategory
     *
     * @return \AppBundle\Entity\AdditionalProductCategory
     */
    public function getAdditionalProductCategory()
    {
        return $this->additionalProductCategory;
    }
}
