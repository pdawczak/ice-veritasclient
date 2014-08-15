<?php

namespace Ice\VeritasClientBundle\Entity;

use JMS\Serializer\Annotation as JMS;

class Programme
{
    const ONLINE_ID = 491;

    /**
     * @var integer
     *
     * @JMS\Type("integer")
     */
    private $id;

    /**
     * @var integer
     *
     * @JMS\Type("string")
     */
    private $title;

    /**
     * @param int $id
     * @return Programme
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isOnline()
    {
        return $this->id === self::ONLINE_ID;
    }

    /**
     * @param int $title
     * @return Programme
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int
     */
    public function getTitle()
    {
        return $this->title;
    }
}
