<?php

namespace Scout\Constraints\Field;

use Scout\ScoutConstraint;

class RequiredConstraint extends ScoutConstraint
{
    public function test($value)
    {
        return !empty($value);
    }
}
