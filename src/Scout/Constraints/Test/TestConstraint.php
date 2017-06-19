<?php

namespace Scout\Constraints\Test;

use Scout\ScoutConstraint;

class TestConstraint extends ScoutConstraint
{
    public function test($value)
    {
        if (empty($value))
            return True;
        return false;
    }
}
