<?php

namespace Ice\VeritasClientBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

class Course
{
    /**
     * NB: Status IDs are deprecated - please avoid using these. Favour primary source data instead - for example,
     * a course is full iff any of its required booking items have reached capacity.
     */
    const STATUS_ID_CURRENT = 1;
    const STATUS_ID_WAITING_LIST = 2;
    const STATUS_ID_FULL = 3;
    const STATUS_ID_CANCELLED = 4;
    const STATUS_ID_ARCHIVE = 5;
    const STATUS_ID_REGISTER_INTEREST = 7;

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
     * @JMS\SerializedName("titleHtml")
     */
    private $titleHtml;

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
    private $courseRegistrationRequirements = array();

    /**
     * @var CourseApplicationRequirement[]
     *
     * @JMS\Type("ArrayCollection<Ice\VeritasClientBundle\Entity\CourseApplicationRequirement>")
     * @JMS\SerializedName("courseApplicationRequirements")
     */
    private $courseApplicationRequirements = array();

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
     * @var BookingItem[]|ArrayCollection
     *
     * @JMS\Expose
     * @JMS\SerializedName("bookingItems")
     * @JMS\Type("ArrayCollection<Ice\VeritasClientBundle\Entity\BookingItem>")
     */
    private $bookingItems;

    /**
     * @var int
     *
     * @JMS\Expose
     * @JMS\SerializedName("statusId")
     * @JMS\Type("integer")
     */
    private $statusId;

    /**
     * @var int
     *
     * @JMS\Expose
     * @JMS\SerializedName("levelId")
     * @JMS\Type("integer")
     */
    private $levelId;

    /**
     * @var Level
     *
     * @JMS\Expose
     * @JMS\SerializedName("level")
     * @JMS\Type("Ice\VeritasClientBundle\Entity\Level")
     */
    private $level;

    /**
     * @var int
     *
     * @JMS\Expose
     * @JMS\SerializedName("programmeId")
     * @JMS\Type("integer")
     */
    private $programmeId;

    /**
     * @var string
     * @JMS\Expose
     * @JMS\SerializedName("shortDesc")
     * @JMS\Type("string")
     */
    private $shortDescription;

    /**
     * @var integer
     *
     * @JMS\Expose
     * @JMS\Type("integer")
     * @JMS\SerializedName("maximumPlaces")
     */
    private $capacity;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime")
     * @JMS\SerializedName("cancelledDate")
     */
    private $cancelledDate;

    /**
     * @var string
     * @JMS\Expose
     * @JMS\SerializedName("cancelledReason")
     * @JMS\Type("string")
     */
    private $cancellationReason;

    /**
     * @var string
     * @JMS\Expose
     * @JMS\SerializedName("cancelledBy")
     * @JMS\Type("string")
     */
    private $cancelledBy;

    /**
     * @var ArrayCollection|CamsisClass[]
     *
     * @JMS\Expose
     * @JMS\Type("ArrayCollection<Ice\VeritasClientBundle\Entity\CamsisClass>")
     * @JMS\SerializedName("camsisClasses")
     */
    private $camsisClasses;

    /**
     * @var CourseAttribute[]|ArrayCollection
     *
     * @JMS\Expose
     * @JMS\Type("ArrayCollection<Ice\VeritasClientBundle\Entity\CourseAttribute>")
     * @JMS\SerializedName("attributes")
     */
    private $attributes;

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
     * @return \Ice\VeritasClientBundle\Entity\CourseApplicationRequirement[]
     */
    public function getCourseApplicationRequirements()
    {
        $this->courseApplicationRequirements = [
            (new CourseApplicationRequirement())
                ->setReference('account')
                ->setVersion('1.0.2')
                ->setDescription('Personal details')
                ->setOrder(1),
            (new CourseApplicationRequirement())
                ->setReference('address')
                ->setVersion('1.0.2')
                ->setDescription('Address')
                ->setOrder(2)
        ];
        return $this->courseApplicationRequirements;
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
        $this->tuitionFee = $tuitionFee / 100;
        return $this;
    }

    /**
     * @return int
     */
    public function getTuitionFee()
    {
        return $this->tuitionFee * 100;
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

    /**
     * Collection of items that are available to be booked for the course
     *
     * @return ArrayCollection|BookingItem[]
     */
    public function getBookingItems()
    {
        return $this->bookingItems;
    }

    /**
     * @param $code
     *
     * @return null|BookingItem
     */
    public function getBookingItemByCode($code)
    {
        $item = $this->getBookingItems()->filter(function (BookingItem $item) use ($code) {
            return $item->getCode() === $code;
        })->first();

        if (!$item) {
            return null;
        }

        return $item;
    }

    /**
     * @return bool
     */
    public function isCancelled()
    {
        return $this->cancelledDate != null;
    }

    /**
     * @param \DateTime $cancelledDate
     * @return Course
     */
    public function setCancelledDate($cancelledDate)
    {
        $this->cancelledDate = $cancelledDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCancelledDate()
    {
        return $this->cancelledDate;
    }

    /**
     * @param string $cancelledBy
     * @return Course
     */
    public function setCancelledBy($cancelledBy)
    {
        $this->cancelledBy = $cancelledBy;
        return $this;
    }

    /**
     * @return string
     */
    public function getCancelledBy()
    {
        return $this->cancelledBy;
    }

    /**
     * @param string $cancellationReason
     * @return Course
     */
    public function setCancellationReason($cancellationReason)
    {
        $this->cancellationReason = $cancellationReason;
        return $this;
    }

    /**
     * @return string
     */
    public function getCancellationReason()
    {
        return $this->cancellationReason;
    }

    /**
     * @param string $shortDescription
     * @return Course
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    /**
     * @return int
     * @deprecated Use capacity of tuition bookingItem instead
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Return true iff all required booking items have booked < capacity
     *
     * @return bool
     */
    public function isInStock()
    {
        foreach ($this->getBookingItems() as $bookingItem) {
            if ($bookingItem->getRequired() && (!$bookingItem->isInStock())) {
                return false;
            }
        }
        return true;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Ice\VeritasClientBundle\Entity\CamsisClass[]
     */
    public function getCamsisClasses()
    {
        return $this->camsisClasses;
    }

    /**
     * String with optional <em>, <i>, <b> and <strong> tags for formatting
     *
     * @return string
     */
    public function getTitleHtml()
    {
        return $this->titleHtml;
    }

    /**
     * @return \Ice\VeritasClientBundle\Entity\Level
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Ice\VeritasClientBundle\Entity\CourseAttribute[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Returns an CourseAttribute by name, or null if none is present
     * @param string $name
     * @return CourseAttribute|null
     */
    public function getAttributeByName($name)
    {
        foreach ($this->attributes as $attribute) {
            if ($attribute->getName() === $name) {
                return $attribute;
            }
        }
        return null;
    }
}