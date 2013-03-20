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
     * @JMS\Exclude
     */
    private $courseRegistrationRequirements = array();

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
        if(!$this->courseRegistrationRequirements){
            $this->addCourseRegistrationRequirement('personalDetails');
        }
        return $this->courseRegistrationRequirements;
    }

    /**
     * @param string $code
     * @param int $version
     */
    private function addCourseRegistrationRequirement($code, $version = 1){
        $newRequirement = new CourseRegistrationRequirement();
        $newRequirement->setCode($code);
        $newRequirement->setVersion($version);
        $this->courseRegistrationRequirements[] = $newRequirement;
    }
}