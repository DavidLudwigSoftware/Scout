<?php

namespace Scout\Constraints;

use Scout\ScoutConstraint;

class FloatConstraint extends ScoutConstraint
{
    public function test($value)
    {
        if (empty($value))

            return True;

        $v = $value;

        return !ctype_digit($v) && is_numeric($v);
    }
}
