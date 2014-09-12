<?php


if ( ! is_file($autoloadFile = __DIR__.'/../vendor/autoload.php')) {
    echo 'Could not find "vendor/autoload.php". Did you forget to run "composer install --dev"?'.PHP_EOL;
    exit(1);
}

require_once $autoloadFile;

use Doctrine\Common\Annotations\AnnotationRegistry;
AnnotationRegistry::registerLoader('class_exists');

Guzzle\Tests\GuzzleTestCase::setServiceBuilder(Guzzle\Service\Builder\ServiceBuilder::factory(array(
    'services' => [
        'veritas_client' => array(
            'class' => 'Guzzle\Service\Client'
        )
    ]
)));