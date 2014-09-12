<?php

namespace Ice\VeritasClientBundle\Entity;

use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

class CamsisClass
{
    /**
     * @var string
     *
     * @Expose
     * @Type("string")
     * @SerializedName("courseId")
     */
    private $courseId;

    /**
     * @var string
     *
     * @Expose
     * @Type("string")
     * @SerializedName("courseOfferingNumber")
     */
    private $courseOfferNumber;

    /**
     * @var string
     *
     * @Expose
     * @Type("string")
     */
    private $term;

    /**
     * @var string
     *
     * @Expose
     * @Type("string")
     * @SerializedName("sessionCode")
     */
    private $sessionCode;

    /**
     * @var string
     *
     * @Expose
     * @Type("string")
     */
    private $section;

    /**
     * @var string
     *
     * @Expose
     * @Type("string")
     * @SerializedName("academicGroup")
     */
    private $academicGroup;

    /**
     * @var string
     *
     * @Expose
     * @Type("string")
     */
    private $subject;

    /**
     * @var string
     *
     * @Expose
     * @Type("string")
     * @SerializedName("catalogNumber")
     */
    private $catalogNumber;

    /**
     * @var string
     *
     * @Expose
     * @Type("string")
     */
    private $number;

    /**
     * @var string
     *
     * @Expose
     * @Type("string")
     */
    private $status;

    /**
     * @return string
     */
    public function getAcademicGroup()
    {
        return $this->academicGroup;
    }

    /**
     * @return string
     */
    public function getCatalogNumber()
    {
        return $this->catalogNumber;
    }

    /**
     * @return string
     */
    public function getCourseId()
    {
        return $this->courseId;
    }

    /**
     * @return string
     */
    public function getCourseOfferNumber()
    {
        return $this->courseOfferNumber;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @return string
     */
    public function getSessionCode()
    {
        return $this->sessionCode;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return 'A' === $this->getStatus();
    }

}
