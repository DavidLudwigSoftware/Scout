<?php

namespace Scout\Constraints\File;

use Scout\ScoutConstraint;

class ExtensionConstraint extends ScoutConstraint
{
    public function test($file, ...$exts)
    {
        if ($file === Null || empty($file['name']))

            return True;

        return in_array(pathinfo($file['name'], PATHINFO_EXTENSION), $exts);
    }
}
