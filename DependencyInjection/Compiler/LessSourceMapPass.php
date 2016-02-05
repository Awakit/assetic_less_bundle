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
            $lessAsseticFilter = $container->getDefinition('assetic.filter.lessphp');
            // Ajout des options au dumper
            $lessAsseticFilter->addMethodCall('addTreeOption', array('outputSourceFiles', true));
            $lessAsseticFilter->addMethodCall('addTreeOption', array('sourceMap', true));
        }
    }
}