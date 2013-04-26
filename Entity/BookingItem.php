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

}
