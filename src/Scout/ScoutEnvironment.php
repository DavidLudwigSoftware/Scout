<?php

namespace Scout;

class ScoutEnvironment
{
    private $_locale;
    private $_database;

    public function __construct($localePath, $database = Null, $options = [])
    {
        $this->buildOptions($options);

        $this->_locale = require $localePath;
        $this->_database = $database;
    }

    protected function buildOptions($options)
    {
        $this->_options = [

        ];

        $this->_options = array_merge($this->_options, $options);
    }

    public function locale()
    {
        return $this->_locale;
    }

    public function database()
    {
        return $this->_database;
    }
}
