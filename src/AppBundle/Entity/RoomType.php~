<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="roomType")
 */
class RoomType extends Product {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id; // integer

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $capacity;

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $quantityOfPersons;

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $positionInSubMenu;

    /**
     * @ORM\OneToMany(targetEntity="Availability", mappedBy="roomType")
     */
    private $availabilities;

    public function __construct() {
        parent::__construct();
        $this->availabilities = new ArrayCollection();
    }

}
