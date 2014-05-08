<?php

namespace Ice\VeritasClientBundle\Entity;

use JMS\Serializer\Annotation as JMS;

class CourseApplicationRequirement
{
    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $reference;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $version;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $description;

    /**
     * @var int
     *
     * @JMS\Type("integer")
     */
    private $order;

    /**
     * @param int $version
     * @return CourseApplicationRequirement
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $code
     * @return CourseApplicationRequirement
     */
    public function setReference($code)
    {
        $this->reference = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $description
     * @return CourseApplicationRequirement
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param int $order
     * @return CourseApplicationRequirement
     */
    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }
}
