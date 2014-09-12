<?php

namespace Ice\DoctrineMockOfVeritasClientBundle;

use Ice\DoctrineMockOfVeritasClientBundle\CompilerPass\ReplaceServicePass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class IceDoctrineMockOfVeritasClientBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new ReplaceServicePass());
        parent::build($container);
    }
}
