<?php

namespace Scout;


class Scout
{
    private $_env;

    private $_fields;

    public function __construct(ScoutEnvironment $environment)
    {
        $this->_env = $environment;
        $this->_constraints = require __DIR__ . '/Constraints/constraints.php';
    }

    public function validate(array $fields)
    {
        $this->_fields = $fields;

        $result = new ScoutResult();

        foreach ($fields as $field => $data)

            if (empty(trim($data[1])))

                continue;

            elseif ($error = $this->evaluate($field, $data[0], trim($data[1])))

                $result->addErrors($error);

        return $result;
    }

    protected function evaluate($field, $value, string $ruleString)
    {
        $errors = [];

        $rules = preg_split('/[\s]*\|[\s]*/', $ruleString);

        foreach ($rules as $rule)

            if ($error = $this->testRule($field, $value, $rule))

                $errors[] = $error;

        return $errors ?: Null;
    }

    protected function testRule($field, $value, $rule)
    {
        $rule = preg_split('/\(/', $rule, 2);

        $constraint = new $this->_constraints[$rule[0]]($this);
        $values = [];

        if (isset($rule[1]))
        {
            $values = eval('return [' . substr($rule[1], 0, -1) . '];');

            $result = $constraint->test(trim($value), ...$values);
        }
        else

            $result = $constraint->test($value);

        return ($result) ? Null : new ScoutError($rule[0],
            $this->_env->locale()[$rule[0]], $field, $values);
    }

    public function environment()
    {
        return $this->_env;
    }

    public function field($field)
    {
        return $this->_fields[$field];
    }

    public function fieldValue($field)
    {
        return $this->field($field)[0];
    }
}
