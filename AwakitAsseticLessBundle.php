<?php

namespace Awakit\AsseticLessBundle;

use Awakit\AsseticLessBundle\DependencyInjection\Compiler\LessSourceMapPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AwakitAsseticLessBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new LessSourceMapPass());
    }
}
