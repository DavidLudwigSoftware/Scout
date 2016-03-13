<?php

namespace Scout\Constraints;

use Scout\ScoutConstraint;

class JSONConstraint extends ScoutConstraint
{
    public function test($value)
    {
        if (empty($value))

            return True;

        json_decode($value);

        return (json_last_error() == JSON_ERROR_NONE) ? True : False;
    }
}
