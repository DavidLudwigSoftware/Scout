<?php

namespace Scout\Constraints;

use Scout\ScoutConstraint;

class MinConstraint extends ScoutConstraint
{
    public function test($value, $min)
    {
        if (empty($value))

            return True;

        return $value >= $min;
    }
}
