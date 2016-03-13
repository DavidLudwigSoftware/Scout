<?php

namespace Scout\Constraints;

use Scout\ScoutConstraint;

class MaxConstraint extends ScoutConstraint
{
    public function test($value, $max)
    {
        if (empty($value))

            return True;

        return $value <= $max;
    }
}
