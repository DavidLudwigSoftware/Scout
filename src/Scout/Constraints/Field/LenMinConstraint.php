<?php

namespace Scout\Constraints\Field;

use Scout\ScoutConstraint;

class LenMinConstraint extends ScoutConstraint
{
    public function test($value, $min)
    {
        if (empty($value))

            return True;

        return strlen($value) >= $min;
    }
}
