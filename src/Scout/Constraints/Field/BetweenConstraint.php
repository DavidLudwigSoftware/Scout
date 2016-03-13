<?php

namespace Scout\Constraints\Field;

use Scout\ScoutConstraint;

class BetweenConstraint extends ScoutConstraint
{
    public function test($value, $min, $max)
    {
        if (empty($value))

            return True;

        return $min < $value && $max > $value;
    }
}
