<?php

namespace Scout\Constraints\Field;

use Scout\ScoutConstraint;

class AlphaNumConstraint extends ScoutConstraint
{
    public function test($value)
    {
        if (empty($value))

            return True;

        return ctype_alnum($value);
    }
}
