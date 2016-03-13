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

    public function validate(array $fields, array $files = [])
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

        $parser = new ScoutRuleParser();
        $rules = $parser->parse($ruleString);

        foreach ($rules as $rule)

            if ($error = $this->testRule($field, $value, $rule[0], $rule[1]))

                $errors[] = $error;

        return $errors ?: Null;
    }

    protected function testRule($field, $value, $rule, $params)
    {

        $constraint = new $this->_constraints[$rule]($this);

        if ($params !== Null)
        {
            $result = $constraint->test(trim($value), ...$params);
        }
        else

            $result = $constraint->test(trim($value));

        return ($result) ? Null : new ScoutError($rule,
            $this->_env->locale()[$rule], $field, $params);
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
