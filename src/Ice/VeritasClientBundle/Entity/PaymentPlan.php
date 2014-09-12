<?php

namespace Ice\VeritasClientBundle\Entity;

use JMS\Serializer\Annotation as JMS;

class PaymentPlan
{
    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $code;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $version;

    /**
     * @var boolean
     *
     * @JMS\Type("boolean")
     */
    private $frontend;

    /**
     * @var boolean
     *
     * @JMS\Type("boolean")
     */
    private $backend;

    /**
     * @param string $version
     * @return PaymentPlan
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
     * @return PaymentPlan
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Is the payment method available in the frontend
     *
     * @return boolean
     */
    public function isFrontend()
    {
        return $this->frontend;
    }

    /**
     * Is the payment method available in the backend
     *
     * @return boolean
     */
    public function isBackend()
    {
        return $this->backend;
    }
}