<?php

namespace Ice\VeritasClientBundle\Tests\CommandHandler;

interface ApplicationScenarioInterface
{
    public function setupMockCommand($mock);

    public function getExpectedOutput();
}
