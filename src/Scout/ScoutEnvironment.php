<?php

namespace Scout;

class ScoutEnvironment
{
    private $_locale;

    public function __construct($localePath, $options = [])
    {
        $this->buildOptions($options);

        $this->_locale = require $localePath;
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
}
