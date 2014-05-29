<?php

namespace Ice\VeritasClientBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

class Level
{
    const FHEQ4_ID = 1;
    const FHEQ5_ID = 2;
    const FHEQ6_ID = 3;
    const LEVEL_M_ID = 4;
    const MASTER_OF_STUDIES_ID = 5;
    const NON_ACCREDITED_ID = 6;
    
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
    private $description;

    /**
     * @param string $description
     * @return Level
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
     * @param int $id
     * @return Level
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
     * True if the level is FHEQ 4 exactly
     *
     * @return bool
     */
    public function isFheq4()
    {
        return $this->id === self::FHEQ4_ID;
    }

    /**
     * True if the level is FHEQ 5 exactly
     *
     * @return bool
     */
    public function isFheq5()
    {
        return $this->id === self::FHEQ5_ID;
    }

    /**
     * True if the level is FHEQ 6 exactly
     *
     * @return bool
     */
    public function isFheq6()
    {
        return $this->id === self::FHEQ6_ID;
    }

    /**
     * True if the level is Level M exactly
     *
     * @return bool
     */
    public function isLevelM()
    {
        return $this->id === self::LEVEL_M_ID;
    }

    /**
     * True if the level is Master of Studies exactly
     *
     * @return bool
     */
    public function isMst()
    {
        return $this->id === self::MASTER_OF_STUDIES_ID;
    }

    /**
     * True if the level is non-accredited
     *
     * @return bool
     */
    public function isNonAccredited()
    {
        return $this->id === self::NON_ACCREDITED_ID;
    }
}
