<?php

namespace Oka\ConstraintBundle;

use Oka\ConstraintBundle\DependencyInjection\Compiler\ObjectExistValidatorPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Cedrick Oka Baidai <okacedrick@gmail.com>
 */
class OkaConstraintBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ObjectExistValidatorPass(), PassConfig::TYPE_BEFORE_OPTIMIZATION, 255);
    }
}
