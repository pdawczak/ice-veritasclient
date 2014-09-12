<?php

namespace tests\Resources;

require_once __DIR__ . '/app/AppKernel.php';

use Liip\FunctionalTestBundle\Test\WebTestCase;

class ContainerAwareTestCase extends WebTestCase
{
    /**
     * @param array $options
     * @return \AppKernel|\Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public static function createKernel(array $options = array())
    {
        return new \AppKernel('dev', false);
    }
}
