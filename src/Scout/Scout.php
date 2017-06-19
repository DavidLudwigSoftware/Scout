<?php

namespace Scout;

class Scout
{
    private $_env;
    private $_fields;

    public function __construct(ScoutEnvironment $environment)
    {
        $this->_env = $environment;
        $this->_constraints = $environment->constraints();
    }

    public function validate(array $fields, array $files = [])
    {
        $this->_fields = $fields;

        $result = new ScoutResult();

        foreach ($fields as $field => $data)
            if (empty(trim($data[1])))
                continue;
            elseif ($error = $this->evaluate('field', $field, $data[0], trim($data[1]), @$data[2]))
                $result->addErrors($error);


        foreach ($files as $field => $data)
            if (empty(trim($data[1])))
                continue;
            elseif ($error = $this->evaluate('file', $field, $data[0], trim($data[1]), @$data[2]))
                $result->addErrors($error);

        return $result;
    }

    protected function evaluate($type, $field, $value, string $ruleString, $customMessages = [])
    {
        $errors = [];

        $parser = new ScoutRuleParser();
        $rules = $parser->parse($ruleString);

        $messages = $this->_env->locale()[$type];

        if ($customMessages)
            $messages = array_merge($messages, $customMessages);

        foreach ($rules as $rule) {
            $message = isset($messages[$rule[0]]) ? $messages[$rule[0]] : '';
            if ($error = $this->testRule($type, $field, $value, $rule[0], $rule[1], $message))
                $errors[] = $error;
        }

        return $errors ?: Null;
    }

    protected function testRule($type, $field, $value, $rule, $params, $message)
    {
        $constraint = new $this->_constraints[$type][$rule]($this);

        if ($type != 'file')
            $value = trim($value);

        if ($params !== Null)
            $result = $constraint->test($value, ...$params);

        else
            $result = $constraint->test($value);

        if ($result)
            return Null;

        return new ScoutError($rule, $message, $field, $params);
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
