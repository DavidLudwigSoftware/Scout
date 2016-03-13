<?php

namespace Scout\Constraints\Field;

use Scout\ScoutConstraint;

class AcceptedConstraint extends ScoutConstraint
{
    public function test($value)
    {
        if (empty($value))

            return True;

        $v = strtolower($value);

        return filter_var($v, FILTER_VALIDATE_BOOLEAN);
    }
}
