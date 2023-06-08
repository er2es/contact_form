<?php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class AllFieldsNotEmpty extends Constraint
{
    public $message = "Hiba! Kérjük töltsd ki az összes mezőt!";
}