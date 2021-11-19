<?php

namespace Oka\ConstraintBundle\DependencyInjection\Compiler;

use Oka\ConstraintBundle\Validator\DocumentExist;
use Oka\ConstraintBundle\Validator\EntityExist;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

/**
 * @author Cedrick Oka Baidai <okacedrick@gmail.com>
 */
class ObjectExistValidatorPass implements CompilerPassInterface
{
    /**
     * @var array
     */
    public static $constraints = [
        'EntityExist' => [
            'registry' => 'doctrine.orm.entity_manager',
            'class' => EntityExist::class
        ],
        'DocumentExist' => [
            'registry' => 'doctrine_mongodb.odm.document_manager',
            'class' => DocumentExist::class
        ],
    ];

    public function process(ContainerBuilder $container)
    {
        foreach (static::$constraints as $key => $constraint) {
            if (false === $container->has($constraint['registry'])) {
                continue;
            }
            
            $container->setDefinition($constraint['class'], new Definition($constraint['class'], [new Reference($constraint['registry'])]))
                      ->addTag('validator.constraint_validator', ['alias' => $key]);
        }
    }
}
