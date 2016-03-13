<?php

namespace Scout\Constraints;

use Scout\ScoutConstraint;

class RequiredConstraint extends ScoutConstraint
{
    public function test($value)
    {
        return !empty($value);
    }
}
