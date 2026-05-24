<?php

namespace Oka\ConstraintBundle\Validator;

use Doctrine\Common\Annotations\Annotation;

/**
 * @author Cedrick Oka Baidai <okacedrick@gmail.com>
 *
 * @Annotation()
 */
#[\Attribute()]
final class EntityExist extends ObjectExist
{
    public $message = 'Entity "%class%" with property "%property%": "%value%" does not exist.';
}
