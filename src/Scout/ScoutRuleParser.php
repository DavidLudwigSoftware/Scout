<?php

namespace Scout;

use Scout\ScoutRuleToken as Token;

use Scout\Exception\InvalidSyntaxError;

class ScoutRuleParser
{
    private $_tokens;
    private $_tokenCount;
    private $_len;

    private $_index;

    public function __construct()
    {

    }

    public function parse($ruleString)
    {
        $lexer = new ScoutRuleLexer();

        $this->_tokens = $lexer->analyze($ruleString);
        $this->_len = count($this->_tokens);

        $this->_index = 0;

        $rules = [];

        for ($this->_index = 0; $this->_index < $this->_len; $this->next())
        {
            $token = $this->token();

            if ($token->type() == Token::CONSTRAINT)
            {
                $rule = [$token->content(), Null];

                if ($this->token(1)->type() == Token::PARAMETERS)
                {
                    $rule[1] = eval('return [' . $this->token(1)->content() . '];');
                    $this->next();
                }

                if ($this->token(1)->type() !== Token::SEPARATOR &&
                    $this->token(1)->type() !== Token::EOF)
                
                    $this->unexpectedToken($this->token(1));


                $this->next();

                $rules[] = $rule;
            }
            else

                $this->unexpectedToken($this->token());

        }

        return $rules;
    }

    protected function token($offset = 0)
    {
        if ($this->_index + $offset < $this->_tokens)

            return $this->_tokens[$this->_index + $offset];

        return Null;
    }

    public function next()
    {
        $this->_index++;
    }

    public function prev()
    {
        $this->_index--;
    }

    public function unexpectedToken($token)
    {
        throw new InvalidSyntaxError("Unexpected token '" .
            $token->type() . "'");
    }
}
