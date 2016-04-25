<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="price")
 */
class Price {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id; // integer

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="prices")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;

}
