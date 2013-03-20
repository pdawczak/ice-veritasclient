<?php
namespace Ice\VeritasClientBundle\Service;

use Guzzle\Service\Client;

class VeritasRestClient extends Client
{

    /**
     * @param \Guzzle\Service\Client $guzzleClient
     */
    public function __construct($baseUrl = '', $config = null){
        parent::__construct($baseUrl, $config);
        $this->setDefaultHeaders(array(
            'Accept'=> 'application/json'
        ));
    }
}