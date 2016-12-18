<?php
/**
 * @author jgn
 * @date 21/11/2016
 * @description For ...
 */

namespace Donjohn\AdminLTEGeneratorBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('donjohn_admin_lte_generator');

        $rootNode
            ->children()
                ->arrayNode('avanzu_admin_theme')->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('theme')->isRequired()->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('control_sidebar')->defaultValue(false)->end()
                            ->end()
                        ->end()
                        ->arrayNode('knp_menu')->isRequired()->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('enable')->defaultValue(true)->end()
                                ->scalarNode('main_menu')->defaultValue('admin')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }

}