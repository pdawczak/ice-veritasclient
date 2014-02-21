<?php

namespace Ice\VeritasClientBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Type;

/**
 * @ExclusionPolicy("ALL")
 */
class BookingItem
{
    /**
     * @var string
     *
     * @Expose
     * @Type("string")
     */
    private $code;

    /**
     * @var string
     *
     * @Expose
     * @Type("string")
     */
    private $title;

    /**
     * @var int
     *
     * @Expose
     * @Type("integer")
     */
    private $capacity;

    /**
     * Price in pence
     *
     * @var int
     *
     * @Expose
     * @Type("integer")
     */
    private $price;

    /**
     * @var string
     *
     * @Expose
     * @Type("string")
     * @SerializedName("vatRate")
     */
    private $vatRate;

    /**
     * @var string
     *
     * @Expose
     * @SerializedName("financeCode")
     * @Type("string")
     */
    private $financeCode;

    /**
     * Maps to Minerva category
     *
     * @var int
     *
     * @Expose
     * @Type("integer")
     */
    private $category;

    /**
     * @var boolean
     *
     * @Expose
     * @Type("boolean")
     */
    private $required;

    /**
     * @var bool
     *
     * @Expose
     * @Type("boolean")
     * @SerializedName("availableInFrontend")
     */
    private $availableInFrontend;

    /**
     * @var bool
     *
     * @Expose
     * @Type("boolean")
     * @SerializedName("availableInBackend")
     */
    private $availableInBackend;

    /**
     * @var int
     *
     * @Expose
     * @Type("integer")
     * @SerializedName("booked")
     */
    private $numberAllocated;

    /**
     * @var BookingItemAttribute[]|ArrayCollection
     *
     * @Expose
     * @Type("ArrayCollection<Ice\VeritasClientBundle\Entity\BookingItemAttribute>")
     * @SerializedName("attributes")
     */
    private $attributes;

    /**
     * @return boolean
     */
    public function getAvailableInBackend()
    {
        return $this->availableInBackend;
    }

    /**
     * @return boolean
     */
    public function getAvailableInFrontend()
    {
        return $this->availableInFrontend;
    }

    /**
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getFinanceCode()
    {
        return $this->financeCode;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return boolean
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getVatRate()
    {
        return $this->vatRate;
    }

    /**
     * The number of times this item has been allocated which count towards its capacity
     *
     * @return int
     */
    public function getNumberAllocated()
    {
        return $this->numberAllocated;
    }

    /**
     * Return true if this item has capacity for at least one more allocation.
     *
     * @return bool
     */
    public function isInStock () {
        return $this->getNumberAllocated() < $this->getCapacity();
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Ice\VeritasClientBundle\Entity\BookingItemAttribute[] $attributes
     * @return BookingItem
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Ice\VeritasClientBundle\Entity\BookingItemAttribute[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Returns an BookingItemAttribute by name
     * @param string $name
     * @return BookingItemAttribute
     */
    public function getAttributeByName($name)
    {
        foreach ($this->attributes as $attribute) {
            if ($attribute->getName() === $name) {
                return $attribute;
            }
        }
    }
}
