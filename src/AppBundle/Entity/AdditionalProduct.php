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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

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
}
