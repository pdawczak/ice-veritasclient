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
     * Tuition fee in pence
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("tuitionFee")
     */
    private $tuitionFee;

    /**
     * Cost centre as a 4 character string
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("costCentre")
     */
    private $costCentre;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime")
     * @JMS\SerializedName("startDate")
     */
    private $startDate;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime")
     * @JMS\SerializedName("endDate")
     */
    private $endDate;

    /**
     * Accommodation options. Currently hardcoded - obviously!
     *
     * Will be replaced with something that includes all line items.
     *
     * @var array
     *
     * @JMS\Type("array")
     * @JMS\Expose()
     * @JMS\SerializedName("accommodationOptions")
     */
    private $accommodationOptions = array(
        array(
            'title' => 'Accommodation at Madingley hall - single',
            'cost' => 11000,
            'financeCode' => 'U.EA.ABCD.GAAA.EFGH.0000',
            'capacity' => 40,
            'booked' => 20,
            'shortCode' => 'accommodation-single',
        ),
        array(
            'title' => 'Accommodation at Madingley hall - double',
            'cost' => 9000,
            'financeCode' => 'U.EA.ABCD.GAAA.EFGH.0000',
            'capacity' => 40,
            'booked' => 20,
            'shortCode' => 'accommodation-double',
        ),
        array(
            'title' => 'Accommodation at Madingley hall - twin',
            'cost' => 9000,
            'financeCode' => 'U.EA.ABCD.GAAA.EFGH.0000',
            'capacity' => 40,
            'booked' => 20,
            'shortCode' => 'accommodation-twin',
        ),
    );

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

    /**
     * @param int $tuitionFee
     * @return Course
     */
    public function setTuitionFee($tuitionFee)
    {
        $this->tuitionFee = $tuitionFee;
        return $this;
    }

    /**
     * @return int
     */
    public function getTuitionFee()
    {
        return $this->tuitionFee;
    }

    /**
     * @param string $costCentre
     * @return Course
     */
    public function setCostCentre($costCentre)
    {
        $this->costCentre = $costCentre;
        return $this;
    }

    /**
     * @return string
     */
    public function getCostCentre()
    {
        return $this->costCentre;
    }

    public function getAccommodationOptions()
    {
        return $this->accommodationOptions;
    }

    /**
     * @param \DateTime $endDate
     * @return Course
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $startDate
     * @return Course
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }
}