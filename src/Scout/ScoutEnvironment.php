<?php

namespace Scout;

class ScoutEnvironment
{
    private $_constraints;
    private $_database;
    private $_locale;

    public function __construct($localePath, $database = Null, $options = [])
    {
        $this->buildOptions($options);

        $this->_constraints = require __DIR__ . '/Constraints/constraints.php';
        $this->_database = $database;
        $this->_locale = require $localePath;
    }

    protected function buildOptions($options)
    {
        $this->_options = [];
        $this->_options = array_merge($this->_options, $options);
    }

    public function addConstraints(array $constraints)
    {
        $this->_constraints = array_merge_recursive($this->_constraints, $constraints);
    }

    public function constraints()
    {
        return $this->_constraints;
    }

    public function locale()
    {
        return $this->_locale;
    }

    public function addLocale(array $locale)
    {
        $this->_locale = array_merge_recursive($this->_locale, $locale);
    }

    public function database()
    {
        return $this->_database;
    }
}
