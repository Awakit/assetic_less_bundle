<?php
/**
 * Created by PhpStorm.
 * User: tpn
 * Date: 05/02/2016
 * Time: 11:31
 */

namespace Awakit\AsseticLessBundle\DependencyInjection\Compiler;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class LessSourceMapPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        // Activation uniquement en mode debug
        if ($container->getParameter('kernel.debug')) {
            $options       = array(
                'cache_dir'         => 'less_cache',
                'compress'          => true,
                'sourceMap'         => true,
                'sourceMapWriteTo'  => __DIR__ . '/css/styles.map',
                'sourceMapURL'      => '/css/styles.map',
                'sourceRoot'        => '/', // 'http://site.com/' or '/'
                // 'sourceMapRootpath' => '/', // 'http://site.com/' or '/'
                'sourceMapBasepath' => __DIR__ ,
            );
            $lessAsseticFilter = $container->getDefinition('assetic.filter.lessphp');
            // Ajout des options au dumper
            $lessAsseticFilter->addMethodCall('setOptions', $options);
            //$lessAsseticFilter->addMethodCall('addTreeOption', );
        }
    }
}