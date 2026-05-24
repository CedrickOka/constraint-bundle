<?php

namespace Oka\ConstraintBundle\Validator;

use Doctrine\Common\Annotations\Annotation;

/**
 * @author Cedrick Oka Baidai <okacedrick@gmail.com>
 *
 * @Annotation()
 */
#[\Attribute()]
final class DocumentExist extends ObjectExist
{
    public $message = 'Document "%class%" with field "%property%": "%value%" does not exist.';
}
