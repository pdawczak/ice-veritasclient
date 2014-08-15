<?php

namespace Ice\VeritasClientBundle\CommandHandler;

use Ice\VeritasClientBundle\Command\NewApplicationCommandInterface;

interface CommandToApplicationArrayAdapterInterface
{
    /**
     * Return an array of properties representing the application in the structure used by the Veritas application API
     *
     * @param NewApplicationCommandInterface $command
     * @return array
     */
    public function getParameters(NewApplicationCommandInterface $command);
}
