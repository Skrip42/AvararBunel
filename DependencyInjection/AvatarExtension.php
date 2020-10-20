<?php

namespace Skrip42\Bundle\AvatarBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Skrip42\Bundle\AvatarBundle\DependencyInjection\Configuration;

class AvatarExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $cgConfig = $config['color_generator'];

        $definition = $container->getDefinition('Skrip42\Bundle\AvatarBundle\ColorGenerator');
        $definition->setArgument(0, $cgConfig['saturation']);
        $definition->setArgument(1, $cgConfig['lightness']);
        $definition->setArgument(2, $cgConfig['algo']);
    }
}
