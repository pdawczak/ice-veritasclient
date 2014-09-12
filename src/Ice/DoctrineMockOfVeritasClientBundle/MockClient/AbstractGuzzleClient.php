<?php

namespace Ice\DoctrineMockOfVeritasClientBundle\MockClient;

use Guzzle\Common\AbstractHasDispatcher;
use Guzzle\Common\Collection;
use Guzzle\Common\Exception\InvalidArgumentException;
use Guzzle\Common\FromConfigInterface;
use Guzzle\Common\HasDispatcherInterface;
use Guzzle\Http\Curl\CurlMultiInterface;
use Guzzle\Http\EntityBodyInterface;
use Guzzle\Http\Message\EntityEnclosingRequestInterface;
use Guzzle\Http\Message\RequestFactoryInterface;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Inflection\InflectorInterface;
use Guzzle\Parser\UriTemplate\UriTemplateInterface;
use Guzzle\Service\Client;
use Guzzle\Service\ClientInterface;
use Guzzle\Service\Command\CommandInterface;
use Guzzle\Service\Command\Factory\FactoryInterface as CommandFactoryInterface;
use Guzzle\Service\Description\ServiceDescriptionInterface;
use Guzzle\Service\Exception\CommandTransferException;
use Guzzle\Service\Resource\ResourceIteratorFactoryInterface;
use Guzzle\Service\Resource\ResourceIteratorInterface;
use Ice\DoctrineMockOfVeritasClientBundle\Exception\MethodNotImplementedException;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

abstract class AbstractGuzzleClient implements ClientInterface
{
    /**
     * Set the URI template expander to use with the client
     *
     * @param UriTemplateInterface $uriTemplate URI template expander
     *
     * @return ClientInterface
     */
    public function setUriTemplate(UriTemplateInterface $uriTemplate)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Get the client's base URL as either an expanded or raw URI template
     *
     * @param bool $expand Set to FALSE to get the raw base URL without URI template expansion
     *
     * @return string|null
     */
    public function getBaseUrl($expand = true)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Create an OPTIONS request for the client
     *
     * @param string|array $uri Resource URI
     *
     * @return RequestInterface
     * @see    Guzzle\Http\ClientInterface::createRequest()
     */
    public function options($uri = null)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Set a curl multi object to be used internally by the client for transferring requests.
     *
     * @param CurlMultiInterface $curlMulti Multi object
     *
     * @return ClientInterface
     */
    public function setCurlMulti(CurlMultiInterface $curlMulti)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Execute one or more commands
     *
     * @param CommandInterface|array $command Command or array of commands to execute
     *
     * @return mixed Returns the result of the executed command or an array of commands if executing multiple commands
     * @throws InvalidArgumentException if an invalid command is passed
     * @throws CommandTransferException if an exception is encountered when transferring multiple commands
     */
    public function execute($command)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Get a resource iterator from the client.
     *
     * @param string|CommandInterface $command         Command class or command name.
     * @param array $commandOptions  Command options used when creating commands.
     * @param array $iteratorOptions Iterator options passed to the iterator when it is instantiated.
     *
     * @return ResourceIteratorInterface
     */
    public function getIterator($command, array $commandOptions = null, array $iteratorOptions = array())
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Get the inflector used with the client
     *
     * @return InflectorInterface
     */
    public function getInflector()
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Set the configuration object to use with the client
     *
     * @param array|Collection|string $config Parameters that define how the client behaves and connects to a
     *                                        webservice. Pass an array or a Collection object.
     * @return ClientInterface
     */
    public function setConfig($config)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Get a configuration setting or all of the configuration settings
     *
     * @param bool|string $key Configuration value to retrieve.  Set to FALSE to retrieve all values of the client.
     *                         The object return can be modified, and modifications will affect the client's config.
     * @return mixed|Collection
     */
    public function getConfig($key = false)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Set SSL verification options.
     *
     * Setting $certificateAuthority to TRUE will result in the bundled
     * cacert.pem being used to verify against the remote host.
     *
     * Alternate certificates to verify against can be specified with the
     * $certificateAuthority option set to a certificate file location to be
     * used with CURLOPT_CAINFO, or a certificate directory path to be used
     * with the CURLOPT_CAPATH option.
     *
     * Setting $certificateAuthority to FALSE will turn off peer verification,
     * unset the bundled cacert.pem, and disable host verification. Please
     * don't do this unless you really know what you're doing, and why
     * you're doing it.
     *
     * @param string|bool $certificateAuthority bool, file path, or directory path
     * @param bool $verifyPeer           FALSE to stop cURL from verifying the peer's certificate.
     * @param int $verifyHost           Set the cURL handle's CURLOPT_SSL_VERIFYHOST option
     *
     * @return ClientInterface
     */
    public function setSslVerification($certificateAuthority = true, $verifyPeer = true, $verifyHost = 2)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Get the default HTTP headers to add to each request created by the client
     *
     * @return Collection
     */
    public function getDefaultHeaders()
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Set the default HTTP headers to add to each request created by the client
     *
     * @param array|Collection $headers Default HTTP headers
     *
     * @return ClientInterface
     */
    public function setDefaultHeaders($headers)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Get the URI template expander used by the client
     *
     * @return UriTemplateInterface
     */
    public function getUriTemplate()
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Expand a URI template using client configuration data
     *
     * @param string $template  URI template to expand
     * @param array $variables Additional variables to use in the expansion
     *
     * @return string
     */
    public function expandTemplate($template, array $variables = null)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Create and return a new {@see RequestInterface} configured for the client.
     *
     * Use an absolute path to override the base path of the client, or a relative path to append to the base path of
     * the client. The URI can contain the query string as well.  Use an array to provide a URI template and additional
     * variables to use in the URI template expansion.
     *
     * @param string $method  HTTP method.  Defaults to GET
     * @param string|array $uri     Resource URI.
     * @param array|Collection $headers HTTP headers
     * @param string|resource|array|EntityBodyInterface $body    Entity body of request (POST/PUT) or response (GET)
     *
     * @return RequestInterface
     * @throws InvalidArgumentException if a URI array is passed that does not contain exactly two elements: the URI
     *                                  followed by template variables
     */
    public function createRequest($method = RequestInterface::GET, $uri = null, $headers = null, $body = null)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Set the User-Agent header to be used on all requests from the client
     *
     * @param string $userAgent      User agent string
     * @param bool $includeDefault Set to true to prepend the value to Guzzle's default user agent string
     *
     * @return self
     */
    public function setUserAgent($userAgent, $includeDefault = false)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Create a GET request for the client
     *
     * @param string|array $uri     Resource URI
     * @param array|Collection $headers HTTP headers
     * @param string|resource|array|EntityBodyInterface $body    Where to store the response entity body
     *
     * @return RequestInterface
     * @see    Guzzle\Http\ClientInterface::createRequest()
     */
    public function get($uri = null, $headers = null, $body = null)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Create a HEAD request for the client
     *
     * @param string|array $uri     Resource URI
     * @param array|Collection $headers HTTP headers
     *
     * @return RequestInterface
     * @see    Guzzle\Http\ClientInterface::createRequest()
     */
    public function head($uri = null, $headers = null)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Create a DELETE request for the client
     *
     * @param string|array $uri     Resource URI
     * @param array|Collection $headers HTTP headers
     * @param string|resource|EntityBodyInterface $body    Body to send in the request
     *
     * @return EntityEnclosingRequestInterface
     * @see    Guzzle\Http\ClientInterface::createRequest()
     */
    public function delete($uri = null, $headers = null, $body = null)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Create a PUT request for the client
     *
     * @param string|array $uri     Resource URI
     * @param array|Collection $headers HTTP headers
     * @param string|resource|EntityBodyInterface $body    Body to send in the request
     *
     * @return EntityEnclosingRequestInterface
     * @see    Guzzle\Http\ClientInterface::createRequest()
     */
    public function put($uri = null, $headers = null, $body = null)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Create a POST request for the client
     *
     * @param string|array $uri      Resource URI
     * @param array|Collection $headers  HTTP headers
     * @param array|Collection|string|EntityBodyInterface $postBody POST body. Can be a string, EntityBody, or
     *                                                    associative array of POST fields to send in the body of the
     *                                                    request.  Prefix a value in the array with the @ symbol to
     *                                                    reference a file.
     * @return EntityEnclosingRequestInterface
     * @see    Guzzle\Http\ClientInterface::createRequest()
     */
    public function post($uri = null, $headers = null, $postBody = null)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Sends a single request or an array of requests in parallel
     *
     * @param array $requests Request(s) to send
     *
     * @return array Returns the response(s)
     */
    public function send($requests)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Get a command by name. First, the client will see if it has a service description and if the service description
     * defines a command by the supplied name. If no dynamic command is found, the client will look for a concrete
     * command class exists matching the name supplied. If neither are found, an InvalidArgumentException is thrown.
     *
     * @param string $name Name of the command to retrieve
     * @param array $args Arguments to pass to the command
     *
     * @return CommandInterface
     * @throws InvalidArgumentException if no command can be found by name
     */
    public function getCommand($name, array $args = array())
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Get the service description of the client
     *
     * @return ServiceDescriptionInterface|null
     */
    public function getDescription()
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Set the base URL of the client
     *
     * @param string $url The base service endpoint URL of the webservice
     *
     * @return ClientInterface
     */
    public function setBaseUrl($url)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Get the curl multi object to be used internally by the client for transferring requests.
     *
     * @return CurlMultiInterface
     */
    public function getCurlMulti()
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Set the resource iterator factory associated with the client
     *
     * @param ResourceIteratorFactoryInterface $factory Resource iterator factory
     *
     * @return ClientInterface
     */
    public function setResourceIteratorFactory(ResourceIteratorFactoryInterface $factory)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Set the inflector used with the client
     *
     * @param InflectorInterface $inflector Inflection object
     *
     * @return ClientInterface
     */
    public function setInflector(InflectorInterface $inflector)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Create a PATCH request for the client
     *
     * @param string|array $uri     Resource URI
     * @param array|Collection $headers HTTP headers
     * @param string|resource|EntityBodyInterface $body    Body to send in the request
     *
     * @return EntityEnclosingRequestInterface
     * @see    Guzzle\Http\ClientInterface::createRequest()
     */
    public function patch($uri = null, $headers = null, $body = null)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Set the request factory to use with the client when creating requests
     *
     * @param RequestFactoryInterface $factory Request factory
     *
     * @return ClientInterface
     */
    public function setRequestFactory(RequestFactoryInterface $factory)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Set the service description of the client
     *
     * @param ServiceDescriptionInterface $service Service description
     *
     * @return ClientInterface
     */
    public function setDescription(ServiceDescriptionInterface $service)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Set the command factory used to create commands by name
     *
     * @param CommandFactoryInterface $factory Command factory
     *
     * @return ClientInterface
     */
    public function setCommandFactory(CommandFactoryInterface $factory)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Static factory method used to turn an array or collection of configuration data into an instantiated object.
     *
     * @param array|Collection $config Configuration data
     *
     * @return FromConfigInterface
     */
    public static function factory($config = array())
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Get a list of all of the events emitted from the class
     *
     * @return array
     */
    public static function getAllEvents()
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Set the EventDispatcher of the request
     *
     * @param EventDispatcherInterface $eventDispatcher
     *
     * @return HasDispatcherInterface
     */
    public function setEventDispatcher(EventDispatcherInterface $eventDispatcher)
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Get the EventDispatcher of the request
     *
     * @return EventDispatcherInterface
     */
    public function getEventDispatcher()
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Helper to dispatch Guzzle events and set the event name on the event
     *
     * @param string $eventName Name of the event to dispatch
     * @param array $context   Context of the event
     */
    public function dispatch($eventName, array $context = array())
    {
        throw new MethodNotImplementedException();
    }

    /**
     * Add an event subscriber to the dispatcher
     *
     * @param EventSubscriberInterface $subscriber Event subscriber
     *
     * @return AbstractHasDispatcher
     */
    public function addSubscriber(EventSubscriberInterface $subscriber)
    {
        throw new MethodNotImplementedException();
    }
}
