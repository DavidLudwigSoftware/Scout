<?php

namespace Scout;


abstract class ScoutConstraint
{
    private $_scout;

    public function __construct(Scout $scout)
    {
        $this->_scout = $scout;
    }

    public function scout()
    {
        return $this->_scout;
    }
}
