<?php

namespace Oka\ConstraintBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @author Cedrick Oka Baidai <okacedrick@gmail.com>
 */
abstract class ObjectExist extends Constraint
{
    public $class;
    public $property = 'id';
    public $message = 'Object "%class%" with property "%property%": "%value%" does not exist.';

    public function __construct(
        $class,
        ?string $property = null,
        ?string $message = null,
        ?array $groups = null,
        $payload = null,
        array $options = [],
    ) {
        if (\is_array($class)) {
            $options = array_merge($class, $options);
        } elseif (null !== $class) {
            $options['class'] = $class;
        }

        parent::__construct($options, $groups, $payload);

        $this->property = $property ?? $this->property;
        $this->message = $message ?? $this->message;
    }

    /**
     * @see Constraint::getDefaultOption()
     */
    public function getDefaultOption(): string
    {
        return 'class';
    }

    /**
     * @see Constraint::getRequiredOptions()
     */
    public function getRequiredOptions(): array
    {
        return ['class'];
    }
}
