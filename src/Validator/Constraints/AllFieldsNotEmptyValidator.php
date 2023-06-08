<?php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class AllFieldsNotEmptyValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        $fieldsNotEmpty = true;

        foreach ($value as $fieldName => $fieldValue) {
            if (empty($fieldValue) || trim($fieldValue)=="") {
                $fieldsNotEmpty = false;
                break;
            }
        }

        if (!$fieldsNotEmpty) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}