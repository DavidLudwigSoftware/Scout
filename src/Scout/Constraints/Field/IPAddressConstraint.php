<?php

namespace Scout\Constraints\Field;

use Scout\ScoutConstraint;

class IPAddressConstraint extends ScoutConstraint
{
    public function test($value)
    {
        if (empty($value))

            return True;

        return !filter_var($value, FILTER_VALIDATE_IP) === False;
    }
}
