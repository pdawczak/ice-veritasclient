<?php

namespace Ice\VeritasClientBundle\Tests\CommandHandler;

use Guzzle\Http\Message\EntityEnclosingRequest;
use Guzzle\Http\Message\Response;
use Guzzle\Service\Description\ServiceDescriptionLoader;
use Guzzle\Tests\GuzzleTestCase;
use Ice\VeritasClientBundle\CommandHandler\CommandToApplicationArrayAdapter;
use Ice\VeritasClientBundle\CommandHandler\GuzzleApplicationCommandHandler;
use Ice\VeritasClientBundle\Tests\CommandHandler\Scenarios\Scenario1;
use Ice\VeritasClientBundle\Tests\CommandHandler\Scenarios\Scenario2;

class GuzzleApplicationCommandHandlerTest extends GuzzleTestCase
{
    /** @var \Guzzle\Service\Client $client */
    private $client;

    protected function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('veritas_client');
        $this->client->setDescription((new ServiceDescriptionLoader())->load(__DIR__.'/../../Resources/config/client.json'));
    }

    public function testNewApplication()
    {
        $class = new GuzzleApplicationCommandHandler(
            $this->client,
            new CommandToApplicationArrayAdapter()
        );

        /** @var ApplicationScenarioInterface[] $scenarios */
        $scenarios = [
            new Scenario1(),
            new Scenario2()
        ];

        foreach ($scenarios as $scenario) {
            $mock = $this->getMockBuilder('\Ice\VeritasClientBundle\Command\NewApplicationCommandInterface')->getMock();
            $this->setMockResponse($this->client, [new Response(200)]);
            $class->newApplication($scenario->setupMockCommand($mock));

            $requests = $this->getMockedRequests();
            $this->assertEquals(1, count($requests));

            /** @var EntityEnclosingRequest $request */
            $request = $requests[0];

            $this->assertEquals($request->getMethod(), 'POST', 'Bad method');
            $this->assertEquals($request->getHeader('Content-type'), 'application/xml', 'Bad content-type');
            $this->assertEquals(
                $this->formatXml($scenario->getExpectedOutput()),
                $this->formatXml($request->getBody()),
                'Bad XML body'
            );
        }
    }

    private function formatXml($unformattedXml)
    {
        $dom = new \DOMDocument;
        $dom->preserveWhiteSpace = FALSE;
        $dom->loadXML($unformattedXml);
        $dom->formatOutput = TRUE;
        return $dom->saveXml();
    }
}
