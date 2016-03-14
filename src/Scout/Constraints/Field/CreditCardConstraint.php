<?php

namespace Scout\Constraints\Field;

use Scout\ScoutConstraint;

class CreditCardConstraint extends ScoutConstraint
{
    public function test($value)
    {
        if (empty($value))

            return True;

        if (!ctype_digit($value))
        {
            return False;
        }

        $sum = 0;
        $len = strlen($value);

        for ($i = 0; $i < $len - 1; $i++)
        {
            if ($i & 1)
            {
                $sum += intval($value[$i]);
                continue;
            }

            $v = intval($value[$i]) * 2;

            $sum += $v > 9 ? $v - 9 : $v;
        }

        return ($sum + intval($value[$len - 1])) % 10 == 0;
    }
}
