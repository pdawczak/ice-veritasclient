<?php

namespace Ice\VeritasClientBundle\Service;

use Guzzle\Service\Client;
use Ice\VeritasClientBundle\Entity\Course;
use JMS\Serializer\Serializer;

class VeritasClient
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var \JMS\Serializer\Serializer
     */
    private $serializer;

    /**
     * @param Client     $client
     * @param Serializer $serializer
     * @param string     $username
     * @param            $password
     *
     * @return \Ice\VeritasClientBundle\Service\VeritasClient
     */
    public function __construct(Client $client, Serializer $serializer, $username, $password)
    {
        $this->client = $client;
        $this->client->setConfig(array(
            'curl.options' => array(
                'CURLOPT_USERPWD' => sprintf("%s:%s", $username, $password),
            ),
        ));
        $this->serializer = $serializer;
        $this->client->setDefaultHeaders(array(
            'Accept' => 'application/json',
        ));
    }

    /**
     * @param string $id
     *
     * @return \Ice\VeritasClientBundle\Entity\Course
     */
    public function getCourse($id)
    {
        $course = $this->client->getCommand('GetCourse', array(
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
        return $this->client->getCommand('SearchForCourse', array(
            'term' => $term,
        ))->execute();
    }

    /**
     * @param $id
     *
     * @return Course
     */
    public function setCourseCurrent($id)
    {
        return $this->client->getCommand('SetCourseCurrent', array(
            'id' => $id,
        ))->execute();
    }

    /**
     * @param $id
     *
     * @return Course
     */
    public function setCourseFull($id)
    {
        return $this->client->getCommand('SetCourseFull', array(
            'id' => $id,
        ))->execute();
    }
}