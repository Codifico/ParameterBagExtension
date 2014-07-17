<?php

namespace Codifico\ParameterBagExtension\ServiceContainer;

use Behat\Testwork\ServiceContainer\Extension as ExtensionInterface;
use Behat\Testwork\ServiceContainer\ExtensionManager;
use Behat\Behat\Context\ServiceContainer\ContextExtension;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class ParameterBagExtension implements ExtensionInterface
{
    public function getConfigKey()
    {
        return 'parameter_bag';
    }

    public function initialize(ExtensionManager $extensionManager)
    {

    }

    public function configure(ArrayNodeDefinition $builder)
    {
        $builder
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('parameter_bag')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('class')->defaultValue('Codifico\\ParameterBagExtension\\Bag\\InMemoryParameterBag')->end()
                    ->end()
                ->end()
            ->end()
        ->end();
    }

    public function load(ContainerBuilder $container, array $config)
    {
        $parameterBag = new $config['parameter_bag']['class'];

        $definition = new Definition('Codifico\ParameterBagExtension\Context\Initializer\ParameterBagAwareInitializer', array(
            $parameterBag
        ));

        $definition->addTag(ContextExtension::INITIALIZER_TAG, array('priority' => 0));

        $container->setDefinition('parameter_bag_extension.context_initializer.parameter_bag_aware', $definition);
    }

    public function process(ContainerBuilder $container)
    {
    }
}
