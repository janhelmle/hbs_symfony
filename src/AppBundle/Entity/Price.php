<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PriceRepository")
 * @ORM\Table(name="price" , indexes={ @ORM\Index(name="date_idx", columns={"date"}) })
 */
class Price {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id; // integer

    /**
     * @Assert\DateTime()
     * @Assert\NotNull()
     * @ORM\Column(type="datetime" , nullable=false)
     */
    private $date;

    /**
     * @Assert\NotBlank()
     * @Assert\GreaterThanOrEqual(value = 0)
     * @ORM\Column(type="decimal", scale=2 , precision=7 , nullable=false)
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="prices")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Price
     */
    public function setDate($date) {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return Price
     */
    public function setValue($value) {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue() {
        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
        $errors = $validator->validate($this);
        if ($errors->count() > 0) {
            throw new \Exception('Error. Zustand des Objekts ungueltig');
        }
        return (float) $this->value;
    }

    /**
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return Price
     */
    public function setProduct(\AppBundle\Entity\Product $product = null) {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \AppBundle\Entity\Product
     */
    public function getProduct() {
        return $this->product;
    }

}
