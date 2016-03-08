<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="appmenu")
 */
class AppMenu {
    // -- Datenbank mct:
    //      id              -   9
    //  *   name            -   infocontact
    //      priority        -   10
    //      title           -   Info / Contact
    //      data            -   http://bvg-wp.sportpartnersuche.eu/berliner-verkehrsbetriebe-bvg/
    //  *   title_de        -   Info / Kontakt
    //  *   data_de         -   http://bvg-wp.sportpartnersuche.eu/berliner-verkehrsbetriebe-bvg/
    //      enabled         -   true
    //  *   image           -   content/images/infocontact.svg
    //      image_sha256    -   f9afa1b0b92b1c362273f1bebca201bef3f2875f71942313004b9f7c0b568209
    //  *   type            -   url_view

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id; // integer

    /**
     * @ORM\Column(type="integer" , nullable=true)
     */
    private $priority; // integer 

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $title; // Info \/ Kontakt - in mct JSON // title

    /**
     * @ORM\Column(type="string", length=300 , nullable=true)
     */
    private $data; // http:\/\/bvg-wp.sportpartnersuche.eu\/berliner-verkehrsbetriebe-bvg\/ - in mct JSON

    /**
     * @ORM\Column(type="string", length=300 , nullable=true)
     */
    private $image; // content\/images\/infocontact.svg - in mct JSON

    /**
     * @ORM\Column(type="string", length=300 , nullable=true)
     */
    private $type; // url_view - in mct JSON - 

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $enabled;

    /**
     * @ORM\Column(type="string", length=20 , nullable=true)
     */
    private $background_color; // url_view - in mct JSON - 


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
     * Set priority
     *
     * @param integer $priority
     *
     * @return AppMenu
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return AppMenu
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set data
     *
     * @param string $data
     *
     * @return AppMenu
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return AppMenu
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return AppMenu
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return AppMenu
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set backgroundColor
     *
     * @param string $backgroundColor
     *
     * @return AppMenu
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->background_color = $backgroundColor;

        return $this;
    }

    /**
     * Get backgroundColor
     *
     * @return string
     */
    public function getBackgroundColor()
    {
        return $this->background_color;
    }
}
