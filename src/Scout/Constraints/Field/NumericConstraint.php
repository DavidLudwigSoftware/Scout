<?php

namespace Scout\Constraints\Field;

use Scout\ScoutConstraint;

class NumericConstraint extends ScoutConstraint
{
    public function test($value)
    {
        if (empty($value))

            return True;

        return is_numeric($value);
    }
}
