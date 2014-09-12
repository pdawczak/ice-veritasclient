<?php

namespace Ice\VeritasClientBundle\CommandHandler;

use Ice\VeritasClientBundle\Command\NewApplicationCommandInterface;

interface ApplicationCommandHandlerInterface
{
    /**
     * @param NewApplicationCommandInterface $newApplicationCommand
     * @return mixed
     */
    public function newApplication(NewApplicationCommandInterface $newApplicationCommand);
}
