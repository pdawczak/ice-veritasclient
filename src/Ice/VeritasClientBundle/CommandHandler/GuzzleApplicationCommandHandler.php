<?php

namespace Ice\VeritasClientBundle\CommandHandler;

use Guzzle\Service\Client;
use Ice\VeritasClientBundle\Command\NewApplicationCommandInterface;

class GuzzleApplicationCommandHandler implements ApplicationCommandHandlerInterface
{
    /**
     * @var \Guzzle\Service\Client
     */
    private $client;

    /**
     * @var CommandToApplicationArrayAdapterInterface
     */
    private $paramBuilder;

    public function __construct(Client $client, CommandToApplicationArrayAdapterInterface $paramBuilder) {
        $this->client = $client;
        $this->paramBuilder = $paramBuilder;
    }

    public function newApplication(NewApplicationCommandInterface $newApplicationCommand) {
        $command = $this->client->getCommand(
            "CreateApplication",
            $this->paramBuilder->getParameters($newApplicationCommand)
        );
        $command->execute();
    }
}
