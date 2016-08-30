<?php

namespace Awakit\AsseticLessBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
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
        if (!$container->hasParameter('assetic.filter.lessphp.class')) throw new InvalidConfigurationException('add `lessphp: ~` to assetic->filters in your config.yml');
        if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
            if (in_array($container->getParameter('kernel.environment'), array('dev', 'test'))) {
                $container->setParameter('assetic.filter.lessphp.class','Awakit\AsseticLessBundle\Filter\LessphpNonCachedFilter');
            }
        }
    }
}
