<?php

namespace Oka\ConstraintBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @author Cedrick Oka Baidai <okacedrick@gmail.com>
 */
abstract class ObjectExist extends Constraint
{
    public $message = 'Object "%class%" with property "%property%": "%value%" does not exist.';
    public $property = 'id';
    public $class;

    /**
     * @see \Symfony\Component\Validator\Constraint::getDefaultOption()
     */
    public function getDefaultOption()
    {
        return 'class';
    }

    /**
     * @see \Symfony\Component\Validator\Constraint::getRequiredOptions()
     */
    public function getRequiredOptions()
    {
        return ['class'];
    }
}
