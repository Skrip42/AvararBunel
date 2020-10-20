<?php

namespace Skrip42\Bundle\AvatarBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('avatar');
        $treeBuilder->getRootNode()
                ->children()
                ->arrayNode('color_generator')
                ->addDefaultsIfNotSet()
                        ->children()
                                ->floatNode('saturation')->defaultValue(1)->end()
                                ->floatNode('lightness')->defaultValue(0.65)->end()
                                ->scalarNode('algo')->defaultValue('adler32')->end()
                        ->end()
                    ->end()
                ->end();

        return $treeBuilder;
    }
}
