<?php

namespace Scout\Constraints;

use Scout\ScoutConstraint;

class AlphaConstraint extends ScoutConstraint
{
    public function test($value)
    {
        if (empty($value))

            return True;

        return ctype_alpha($value);
    }
}
