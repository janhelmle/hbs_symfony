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

}
