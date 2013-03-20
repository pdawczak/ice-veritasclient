<?php

namespace Ice\VeritasClientBundle\Entity;

use JMS\Serializer\Annotation\SerializedName,
    JMS\Serializer\Annotation\Type;

class Course
{
    /**
     * @var integer
     *
     * @Type("integer")
     */
    private $id;

    /**
     * @var string
     *
     * @Type("string")
     */
    private $title;

    /**
     * @var string
     *
     * @Type("string")
     */
    private $code;

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
}