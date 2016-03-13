<?php

namespace Scout\Constraints\Field;

use Scout\ScoutConstraint;

class EmailConstraint extends ScoutConstraint
{
    public function test($value)
    {
        if (empty($value))

            return True;

        return !filter_var($value, FILTER_VALIDATE_EMAIL) === False;
    }
}
