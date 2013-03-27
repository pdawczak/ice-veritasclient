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
     * @var int
     *
     * @JMS\Type("integer")
     */
    private $version;

    /**
     * @param int $version
     * @return PaymentPlan
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return int
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
}