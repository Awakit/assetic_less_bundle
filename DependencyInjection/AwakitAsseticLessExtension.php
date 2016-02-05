<?php

namespace Awakit\AsseticLessBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class AwakitAsseticLessExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        if (in_array($container->getParameter('kernel.environment'), array('dev', 'test'))) {
            $container->setParameter('assetic.filter.lessphp.class','Awakit\AsseticLessBundle\Filter\LessphpNonCachedFilter');
        }

        if (!$container->hasParameter('assetic.filter.lessphp.options') ||
            !is_array($container->getParameter('assetic.filter.lessphp.options')))
                $container->setParameter('assetic.filter.lessphp.options', array());

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
