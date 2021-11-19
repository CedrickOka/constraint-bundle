<?php

namespace Oka\ConstraintBundle\Validator;

use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Validator\Exception\LogicException;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * @author Cedrick Oka Baidai <okacedrick@gmail.com>
 */
abstract class ObjectExistValidator extends ConstraintValidator
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof ObjectExist) {
            throw new UnexpectedTypeException($constraint, ObjectExist::class);
        }

        // custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) to take care of that
        if (null === $value || '' === $value) {
            return;
        }

        if (true === empty($constraint->class)) {
            throw new LogicException(\sprintf('Must set "class" on "%s" validator', ObjectExist::class));
        }

        if (true === is_object($value) || true === is_array($value)) {
            $propertyAccessor = PropertyAccess::createPropertyAccessor();
            $propertyPath = true == is_object($value) ? $constraint->property : sprintf('[%s]', $constraint->property);

            if (false === $propertyAccessor->isReadable($value, $propertyPath)) {
                throw new LogicException(\sprintf('Property "%s" is not readable on object "%s"', $constraint->property, $constraint->class));
            }

            $value = $propertyAccessor->getValue($value, $propertyPath);
        }

        if (null === $this->objectManager->getRepository($constraint->class)->findOneBy([$constraint->property => $value])) {
            $this->context->buildViolation($constraint->message)
                          ->setParameter('%class%', $constraint->class)
                          ->setParameter('%property%', $constraint->property)
                          ->setParameter('%value%', (string) $value)
                          ->addViolation();
        }
    }
}
