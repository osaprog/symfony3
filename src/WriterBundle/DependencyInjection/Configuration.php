<?php

namespace WriterBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * Configuration for the emailing bundle
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $fixOptionKeys = function ($options) {
            $fixedOptions = array();
            foreach ($options as $key => $value) {
                $fixedOptions[str_replace('_', '-', $key)] = $value;
            }

            return $fixedOptions;
        };

        $treeBuilder = new TreeBuilder();

        $rootNode = $treeBuilder->root('writer');
        
        $rootNode
            ->children()            
                ->arrayNode('csv')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('enabled')->defaultTrue()->end()
                    ->end()
                ->end()
                ->arrayNode('xml')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('enabled')->defaultTrue()->end()
                    ->end()
                ->end()
                ->arrayNode('json')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('enabled')->defaultTrue()->end()
                    ->end()
                ->end()                
            ->end()
        ;        
        return $treeBuilder;
    }
}
