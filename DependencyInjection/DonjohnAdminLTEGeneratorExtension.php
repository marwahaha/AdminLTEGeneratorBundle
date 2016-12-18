<?php

namespace Donjohn\AdminLTEGeneratorBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class DonjohnAdminLTEGeneratorExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration(), $configs);
        $container->setParameter('donjohn.admin_lte.menu.name', $config['avanzu_admin_theme']['knp_menu']['main_menu']);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }


    public function prepend(ContainerBuilder $container)
    {
        $configs = $container->getExtensionConfig($this->getAlias());
        // use the Configuration class to load default values
        $config = $this->processConfiguration(new Configuration(), $configs);
        foreach ($config as $config_entry => $configBundle)
        {
            if ($container->hasExtension($config_entry))
                $container
                    ->prependExtensionConfig(
                        $container->getExtension($config_entry)->getAlias(),
                        $configBundle
                    );
        }
    }


}
