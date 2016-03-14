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

    public function environment()
    {
        return $this->_scout->environment();
    }

    public function database()
    {
        return $this->_scout->environment()->database();
    }
}
