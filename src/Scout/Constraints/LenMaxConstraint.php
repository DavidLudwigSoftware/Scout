<?php

namespace Scout\Constraints;

use Scout\ScoutConstraint;

class LenMaxConstraint extends ScoutConstraint
{
    public function test($value, $max)
    {
        if (empty($value))

            return True;

        return strlen($value) <= $max;
    }
}
