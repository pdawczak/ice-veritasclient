<?php

namespace Ice\VeritasClientBundle\Entity;

use JMS\Serializer\Annotation as JMS;

class Course
{
    /**
     * @var integer
     *
     * @JMS\Type("integer")
     */
    private $id;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $title;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $code;

    /**
     * @var CourseRegistrationRequirement[]
     *
     * @JMS\Type("ArrayCollection<Ice\VeritasClientBundle\Entity\CourseRegistrationRequirement>")
     * @JMS\SerializedName("courseRegistrationRequirements")
     */
    private $courseRegistrationRequirements;

    /**
     * @var PaymentPlan[]
     *
     * @JMS\Type("ArrayCollection<Ice\VeritasClientBundle\Entity\PaymentPlan>")
     * @JMS\SerializedName("paymentPlans")
     */
    private $paymentPlans;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return CourseRegistrationRequirement[]
     */
    public function getCourseRegistrationRequirements()
    {
        return $this->courseRegistrationRequirements;
    }

    /**
     * @return PaymentPlan[]
     */
    public function getPaymentPlans()
    {
        return $this->paymentPlans;
    }
}