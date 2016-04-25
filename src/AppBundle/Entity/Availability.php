<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="availability")
 */
class Availability {

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
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity="RoomType", inversedBy="availabilities")
     * @ORM\JoinColumn(name="availability_id", referencedColumnName="id")
     */
    private $roomType;

}
