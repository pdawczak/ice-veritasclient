<?php

namespace Ice\VeritasClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ice_veritas_client');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        $rootNode
            ->children()
                ->scalarNode('base_url')
                    ->info('Base URL for the API.')
                ->end()
                ->scalarNode('username')
                    ->info('Username to authenticate against the API.')
                ->end()
                ->scalarNode('password')
                    ->info('Password to authenticate against the API.')
                ->end()
            ->end();

        return $treeBuilder;
    }
}