<?php

namespace Ice\VeritasClientBundle\Tests\Functional;

use Ice\VeritasClientBundle\Tests\CommandHandler\Scenarios\Scenario1;
use Ice\VeritasClientBundle\Tests\Resources\ContainerAwareTestCase;
use Ice\VeritasClientBundle\CommandHandler\ApplicationCommandHandlerInterface;

class NewApplicationTest extends ContainerAwareTestCase
{
    public function testNewApplication()
    {
        /** @var ApplicationCommandHandlerInterface $handler */
        $client = $this->getContainer()->get('veritas.client');
        $handler = $this->getContainer()->get('veritas_client.command_handler.application');
        $mockCommand = $this->getMockBuilder('\Ice\VeritasClientBundle\Command\NewApplicationCommandInterface')->getMock();
        $scenario = new Scenario1();
        $scenario->setupMockCommand($mockCommand);
        $handler->newApplication($mockCommand);
    }
}
