<?php

namespace Ice\VeritasClientBundle\Service;

use Guzzle\Service\Client;
use Doctrine\Common\Collections\ArrayCollection;
use Ice\VeritasClientBundle\Entity\Course;

class VeritasClient
{
    /**
     * @var VeritasRestClient
     */
    private $restClient;

    /**
     * @param \Ice\VeritasClientBundle\Service\VeritasRestClient $restClient
     * @return VeritasClient
     */
    public function setRestClient($restClient)
    {
        $this->restClient = $restClient;
        return $this;
    }

    /**
     * @return \Ice\VeritasClientBundle\Service\VeritasRestClient
     */
    public function getRestClient()
    {
        return $this->restClient;
    }

    /**
     * @param string $id
     * @return \Ice\VeritasClientBundle\Entity\Course
     */
    public function getCourse($id)
    {
        $course = $this->getRestClient()->getCommand('GetCourse', array(
            'id' => $id,
        ))->execute();

        return $course;
    }

    /**
     * @param string $term Search term to match against
     *
     * @return Course[]
     */
    public function searchForCourse($term)
    {
        return $this->getRestClient()->getCommand('SearchForCourse', array(
            'term' => $term,
        ))->execute();
    }
}