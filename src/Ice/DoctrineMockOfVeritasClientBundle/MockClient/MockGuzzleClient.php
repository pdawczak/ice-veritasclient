<?php

namespace Ice\DoctrineMockOfVeritasClientBundle\MockClient;

use Ice\DoctrineMockOfVeritasClientBundle\Exception\CommandNotImplementedException;
use Ice\DoctrineMockOfVeritasClientBundle\MockClient\AbstractGuzzleClient;
use Ice\DoctrineMockOfVeritasClientBundle\MockCommand\MockGetCourseCommand;
use Doctrine\ORM\EntityManager;

class MockGuzzleClient extends AbstractGuzzleClient
{
    /**
     * @param EntityManager $entityManager
     */
    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function setDefaultHeaders($headers)
    {
        //Ignore
    }

    public function getCommand($name, array $args = array())
    {
        switch ($name) {
            case 'GetCourse':
                return new MockGetCourseCommand(
                    $this->getCourseRepository(),
                    $args
                );
                break;
            default:
                throw new CommandNotImplementedException('Command: '.$name.' is not supported');
        }
    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    private function getCourseRepository()
    {
        return $this->entityManager->getRepository('IceDoctrineMockOfVeritasClientBundle:Course');
    }
}
