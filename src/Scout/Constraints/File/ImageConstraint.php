<?php

namespace Scout\Constraints\File;

use Scout\ScoutConstraint;

class ImageConstraint extends ScoutConstraint
{
    public function test($file, ...$exts)
    {
        if ($file === Null || empty($file['name']))

            return True;

        return (bool) exif_imagetype($file['tmp_name']);
    }
}
