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
     * @ORM\OneToMany(targetEntity="Price", mappedBy="product")
     */
    private $prices;

    public function __construct() {
        $this->prices = new ArrayCollection();
    }

}
