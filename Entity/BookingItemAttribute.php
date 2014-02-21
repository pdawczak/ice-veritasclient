<?php

namespace Ice\VeritasClientBundle\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class BookingItemAttribute
 * @package Ice\VeritasClientBundle\Entity
 */
class BookingItemAttribute {

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $name;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $serializedValue;

    /**
     * Set default values
     */
    function __construct()
    {
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $serializedValue
     */
    public function setSerializedValue($serializedValue)
    {
        $this->serializedValue = $serializedValue;
        return $this;
    }

    /**
     * @return string
     */
    public function getSerializedValue()
    {
        return $this->serializedValue;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return unserialize($this->serializedValue);
    }

    /**
     * @param $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->serializedValue = serialize($value);
        return $this;
    }
}