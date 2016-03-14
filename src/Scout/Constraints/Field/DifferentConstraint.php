<?php

namespace Scout\Constraints\Field;

use Scout\ScoutConstraint;

class DifferentConstraint extends ScoutConstraint
{
    public function test($value, $field)
    {
        if (empty($value))

            return True;

        return $value != $this->scout()->fieldValue($field);
    }
}
