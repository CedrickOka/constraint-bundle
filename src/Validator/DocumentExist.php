<?php

namespace Oka\ConstraintBundle\Validator;

/**
 * @author Cedrick Oka Baidai <okacedrick@gmail.com>
 *
 * @Annotation
 */
final class DocumentExist extends ObjectExist
{
    public $message = 'Document "%class%" with field "%property%": "%value%" does not exist.';
}
