<?php
namespace Oka\ConstraintBundle\Validator;

/**
 * @author Cedrick Oka Baidai <okacedrick@gmail.com>
 * 
 * @Annotation
 */
final class EntityExist extends ObjectExist
{
    public string $message = 'Entity "%class%" with property "%property%": "%value%" does not exist.';
}
