<?php

namespace Scout\Constraints\Field;

use Scout\ScoutConstraint;

class UniqueConstraint extends ScoutConstraint
{
    public function test($value, $table, $column)
    {
        if (empty($value))

            return True;

        $stmt = $this->database()->prepare("SELECT * FROM `$table` WHERE `$column`=:value");
        $stmt->bindParam(':value',  $value,  \PDO::PARAM_STR);
        $stmt->execute();

        return !(bool) $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
