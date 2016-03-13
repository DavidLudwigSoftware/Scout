<?php

namespace Scout\Constraints;

use Scout\ScoutConstraint;

class BooleanConstraint extends ScoutConstraint
{
    public function test($value)
    {
        if (empty($value))

            return True;

        $v = strtolower($value);

        return filter_var($v, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) !== Null;
    }
}
