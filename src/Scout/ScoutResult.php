<?php

namespace Scout;


class ScoutResult
{
    private $_errors;

    public function __construct()
    {
        $this->_errors = array();
    }

    public function empty()
    {
        return count($this->_errors) == 0;
    }

    public function noErrors()
    {
        return $this->empty();
    }

    public function has($field)
    {
        return isset($this->_errors[$field]);
    }

    public function first($field)
    {
        return $this->has($field) ? $this->_errors[$field][0] : Null;
    }

    public function errors($field)
    {
        return $this->has($field) ? $this->_errors[$field] : [];
    }

    public function all()
    {
        return $this->toArray();
    }

    public function toArray()
    {
        return $this->_errors;
    }

    public function addError(ScoutError $error)
    {
        $this->_errors[$error->field()][] = $error;
    }

    public function addErrors(array $errors)
    {
        foreach ($errors as $error)

            $this->addError($error);
    }
}
