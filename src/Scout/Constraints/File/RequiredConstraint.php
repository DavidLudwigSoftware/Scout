<?php

namespace Scout\Constraints\File;

use Scout\ScoutConstraint;

class RequiredConstraint extends ScoutConstraint
{
    public function test($file)
    {
        return $file !== Null && !empty($file['name']);
    }
}
