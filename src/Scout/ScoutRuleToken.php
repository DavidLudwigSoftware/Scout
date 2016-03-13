<?php

namespace Scout;


class ScoutRuleToken
{
    /**
     * Types of tokens
     */
    const EOF        = 'EOF';
    const SEPARATOR  = 'SEPARATOR';
    const CONSTRAINT = 'CONSTRAINT';
    const PARAMETERS = 'PARAMETERS';

    /**
     * Store the type of token
     * @var string
     */
    private $_type;

    /**
     * Store the content of the token
     * @var mixed
     */
    private $_content;


    /**
     * Create a token and store any content
     * @param string $type    The type of token
     * @param mixed  $content The content of the token
     */
    public function __construct(string $type, $content = Null)
    {
        $this->_type = $type;
        $this->_content = $content;
    }

    /**
     * Get the type of token
     * @return [type] [description]
     */
    public function type()
    {
        return $this->_type;
    }

    /**
     * Get the content of the token
     * @return mixed
     */
    public function content()
    {
        return $this->_content;
    }
}
