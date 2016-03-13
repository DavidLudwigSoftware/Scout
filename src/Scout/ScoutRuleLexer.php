<?php

namespace Scout;

use Scout\ScoutRuleToken as Token;

class ScoutRuleLexer
{
    private $_content;
    private $_len;
    private $_index;

    private $_tokens;
    private $_data;

    public function __construct()
    {

    }

    public function analyze(string $ruleString)
    {
        $this->_content = $ruleString;
        $this->_len     = strlen($ruleString);
        $this->_tokens  = [];
        $this->_data    = '';

        for ($this->_index = 0; $this->_index < $this->_len; $this->next())

            if ($this->whitespace())

                continue;

            elseif ($this->separator())

                continue;

            elseif ($this->parameters())

                continue;

            elseif ($this->constraint())

                continue;

        $this->token(Token::EOF);

        return $this->_tokens;
    }

    protected function whitespace()
    {
        if (ctype_space($this->char()))
        {
            while (ctype_space($c = $this->char(1)))

                $this->next();

            return True;
        }

        return False;
    }

    protected function separator()
    {
        $c = $this->char();

        if ($c == '|')
        {
            $this->token(Token::SEPARATOR);

            $this->_data = '';

            return True;
        }

        return False;
    }

    protected function parameters()
    {
        $c = $this->char();

        $c = $this->char();

        if ($c == '(')
        {
            $level = 0;
            $string = Null;

            $this->next();
            $c = $this->char();

            while ($c !== Null)
            {
                if ($level == 0 && $string == Null && $c == ')')
                {
                    $this->token(Token::PARAMETERS, $this->_data);

                    $this->_data = '';

                    return True;
                }
                elseif ($string === Null && ($c == '(' || $c == ')'))
                {
                    $level += $c == '(' ? 1 : -1;
                }
                elseif ($string === Null && ($c == "'" || $c == '"'))
                {
                    $string = $c;
                }
                elseif ($string !== Null && $c == '\\')
                {
                    $this->_data .= $c;

                    $this->next();
                    $c = $this->char();
                }
                elseif ($string !== Null && $c == $string)
                {
                    $string = Null;
                }

                if ($c !== Null)

                    $this->_data .= $c;

                $this->next();
                $c = $this->char();
            }

            $this->unexpectedEof();
        }

        return False;
    }

    protected function constraint()
    {
        $c = $this->char();

        while ($c != '|' && $c != '(' && $c !== Null)
        {
            if (!ctype_space($c))

                $this->_data .= $c;

            $this->next();
            $c = $this->char();
        }

        $this->token(Token::CONSTRAINT, $this->_data);

        $this->_data = '';

        $this->prev();

        return True;
    }

    public function char($offset = 0)
    {
        if ($this->_index + $offset < $this->_len)

            return $this->_content[$this->_index + $offset];

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

    public function token(string $type, $content = Null)
    {
        $this->_tokens[] = new Token($type, $content);
    }
}
