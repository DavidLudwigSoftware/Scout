<?php

namespace Scout\Constraints\Field;

use Scout\ScoutConstraint;

class IPv6AddressConstraint extends ScoutConstraint
{
    public function test($value)
    {
        if (empty($value))

            return True;

        return !filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === False;
    }
}
