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
    private $identification; // Info \/ Kontakt - in mct JSON // title

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $title_de; // Info \/ Kontakt - in mct JSON // title

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $title_en; // Info \/ Kontakt - in mct JSON // title

    /**
     * @ORM\Column(type="string", length=300 , nullable=true)
     */
    private $data_url; // http:\/\/bvg-wp.sportpartnersuche.eu\/berliner-verkehrsbetriebe-bvg\/ - in mct JSON

    /**
     * @ORM\Column(type="string", length=300 , nullable=true)
     */
    private $data_type; // url_view - in mct JSON - 

    /**
     * @ORM\Column(type="string", length=300 , nullable=true)
     */
    private $image_source; // content\/images\/infocontact.svg - in mct JSON

    /**
     * @ORM\Column(type="string", length=20 , nullable=true)
     */
    private $image_background_color;

    /**
     * @ORM\Column(type="string", length=20 , nullable=true)
     */
    private $image_background_opacity;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $enabled;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return AppMenu
     */
    public function setPriority($priority) {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority() {
        return $this->priority;
    }

    /**
     * Set identification
     *
     * @param string $identification
     *
     * @return AppMenu
     */
    public function setIdentification($identification) {
        $this->identification = $identification;

        return $this;
    }

    /**
     * Get identification
     *
     * @return string
     */
    public function getIdentification() {
        return $this->identification;
    }

    /**
     * Set titleDe
     *
     * @param string $titleDe
     *
     * @return AppMenu
     */
    public function setTitleDe($titleDe) {
        $this->title_de = $titleDe;

        return $this;
    }

    /**
     * Get titleDe
     *
     * @return string
     */
    public function getTitleDe() {
        return $this->title_de;
    }

    /**
     * Set titleEn
     *
     * @param string $titleEn
     *
     * @return AppMenu
     */
    public function setTitleEn($titleEn) {
        $this->title_en = $titleEn;

        return $this;
    }

    /**
     * Get titleEn
     *
     * @return string
     */
    public function getTitleEn() {
        return $this->title_en;
    }

    /**
     * Set dataUrl
     *
     * @param string $dataUrl
     *
     * @return AppMenu
     */
    public function setDataUrl($dataUrl) {
        $this->data_url = $dataUrl;

        return $this;
    }

    /**
     * Get dataUrl
     *
     * @return string
     */
    public function getDataUrl() {
        return $this->data_url;
    }

    /**
     * Set dataType
     *
     * @param string $dataType
     *
     * @return AppMenu
     */
    public function setDataType($dataType) {
        $this->data_type = $dataType;

        return $this;
    }

    /**
     * Get dataType
     *
     * @return string
     */
    public function getDataType() {
        return $this->data_type;
    }

    /**
     * Set imageSource
     *
     * @param string $imageSource
     *
     * @return AppMenu
     */
    public function setImageSource($imageSource) {
        $this->image_source = $imageSource;

        return $this;
    }

    /**
     * Get imageSource
     *
     * @return string
     */
    public function getImageSource() {
        return $this->image_source;
    }

    /**
     * Set imageBackgroundColor
     *
     * @param string $imageBackgroundColor
     *
     * @return AppMenu
     */
    public function setImageBackgroundColor($imageBackgroundColor) {
        $this->image_background_color = $imageBackgroundColor;

        return $this;
    }

    /**
     * Get imageBackgroundColor
     *
     * @return string
     */
    public function getImageBackgroundColor() {
        return $this->image_background_color;
    }

    /**
     * Set imageBackgroundOpacity
     *
     * @param string $imageBackgroundOpacity
     *
     * @return AppMenu
     */
    public function setImageBackgroundOpacity($imageBackgroundOpacity) {
        $this->image_background_opacity = $imageBackgroundOpacity;

        return $this;
    }

    /**
     * Get imageBackgroundOpacity
     *
     * @return string
     */
    public function getImageBackgroundOpacity() {
        return $this->image_background_opacity;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return AppMenu
     */
    public function setEnabled($enabled) {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled() {
        return $this->enabled;
    }

}
