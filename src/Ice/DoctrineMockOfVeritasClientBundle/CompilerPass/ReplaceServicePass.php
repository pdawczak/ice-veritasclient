<?php

namespace Ice\DoctrineMockOfVeritasClientBundle\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

class ReplaceServicePass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if ($container->getParameterBag()->has('mock_veritas_client_entity_manager')) {
            $emServiceName = $container->getParameter('doctrine.orm.default_entity_manager');
        } else {
            $emServiceName = 'doctrine.orm.default_entity_manager';
        }

        $container->addDefinitions(
            [
                'ice.veritas_client.doctrine_mock_of_guzzle_client' => new Definition(
                    'Ice\DoctrineMockOfVeritasClientBundle\MockClient\MockGuzzleClient',
                    [new Reference($emServiceName)]
                )
            ]
        );

        $definition = $container->getDefinition('veritas.client');
        $constructorArguments = $definition->getArguments();
        $constructorArguments[0] = new Reference('ice.veritas_client.doctrine_mock_of_guzzle_client');
        $definition->setArguments($constructorArguments);
    }
}
