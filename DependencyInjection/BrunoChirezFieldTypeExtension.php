<?php

namespace BrunoChirez\FieldTypeBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Yaml\Yaml;

class BrunoChirezFieldTypeExtension extends Extension implements PrependExtensionInterface
{
    /**
     * Loads a specific configuration.
     *
     * @param array $configs    An array of configuration values
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
		$configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
		
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('fieldtypes.yml');
		$loader->load( 'storage_engines.yml' );
    }

    /**
     * Loads DemoBundle configuration.
     *
     * @param ContainerBuilder $container
     */
    public function prepend(ContainerBuilder $container)
    {
		$config = Yaml::parse(__DIR__ . '/../Resources/config/ezpublish.yml');
        $container->prependExtensionConfig( 'ezpublish', $config );
    }
}
