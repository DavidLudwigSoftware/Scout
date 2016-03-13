<?php

namespace Scout\Constraints\Field;

use Scout\ScoutConstraint;

class IPv4AddressConstraint extends ScoutConstraint
{
    public function test($value)
    {
        if (empty($value))

            return True;

        return !filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === False;
    }
}
