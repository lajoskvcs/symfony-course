<?php
/**
 * Created by PhpStorm.
 * User: diwin
 * Date: 2017. 08. 30.
 * Time: 15:53
 */

namespace Blog\CoreBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $builder = new TreeBuilder();

        $root = $builder->root('decorator');
        $root
            ->children()
                ->scalarNode('decorator_char')->isRequired()->end()
            ->end();

        return $builder;
    }
}