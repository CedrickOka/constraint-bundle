<?php

namespace Oka\ConstraintBundle\DependencyInjection\Compiler;

use Oka\ConstraintBundle\Validator\DocumentExistValidator;
use Oka\ConstraintBundle\Validator\EntityExistValidator;
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
    public static $validators = [
        'EntityExist' => [
            'registry' => 'doctrine.orm.entity_manager',
            'class' => EntityExistValidator::class
        ],
        'DocumentExist' => [
            'registry' => 'doctrine_mongodb.odm.document_manager',
            'class' => DocumentExistValidator::class
        ],
    ];

    public function process(ContainerBuilder $container)
    {
        foreach (static::$validators as $key => $validator) {
            if (false === $container->has($validator['registry'])) {
                continue;
            }

            $container->setDefinition($validator['class'], new Definition($validator['class'], [new Reference($validator['registry'])]))
                      ->addTag('validator.constraint_validator', ['alias' => $key]);
        }
    }
}
