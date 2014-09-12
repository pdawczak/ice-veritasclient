<?php

namespace Ice\DoctrineMockOfVeritasClientBundle\MockCommand;

use Guzzle\Service\Exception\CommandException;
use Ice\VeritasClientBundle\Entity\Course;
use Doctrine\ORM\EntityRepository;

class MockGetCourseCommand extends AbstractMockCommand
{
    /**
     * @var EntityRepository;
     */
    private $courseRepository;

    /**
     * @var array
     */
    private $args;

    public function __construct(
        $courseRepository,
        $args
    )
    {
        $this->args = $args;
        $this->courseRepository = $courseRepository;
    }

    /**
     * Execute the command and return the result
     *
     * @return mixed Returns the result of {@see CommandInterface::execute}
     * @throws CommandException if a client has not been associated with the command
     */
    public function execute()
    {
        return $this->courseRepository->find($this->args['id']);
    }
}
