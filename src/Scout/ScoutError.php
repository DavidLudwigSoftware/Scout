<?php

namespace Scout;


class ScoutError
{
    private $_type;
    private $_field;
    private $_values;
    private $_message;

    public function __construct($type, $message, $field, $values)
    {
        $this->_type = $type;
        $this->_field = $field;
        $this->_values = $values ?: [];
        $this->_message = $message;
    }

    public function type()
    {
        return $this->_type;
    }

    public function message()
    {
        return $this->_message;
    }

    public function field()
    {
        return $this->_field;
    }

    public function values()
    {
        return $this->_values;
    }

    public function set($index, $value)
    {
        $this->_values[$index] = $value;

        return $this;
    }

    public function setField($field)
    {
        $this->_field = $field;

        return $this;
    }

    public function toString($field = Null)
    {
        return sprintf($this->_message,
            ($field ?: $this->_field), ...$this->_values);
    }

    public function __toString()
    {
        return $this->toString();
    }
}
