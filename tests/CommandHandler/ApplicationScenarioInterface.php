<?php

namespace tests\CommandHandler;

interface ApplicationScenarioInterface
{
    public function setupMockCommand($mock);

    public function getExpectedOutput();
}
