<?php

namespace Yaoi\Schema;

class Exception extends \Exception
{
    const INVALID_VALUE = 1;
    const NOT_IMPLEMENTED = 2;

    protected $structureTrace = array();
    private $originalMessage;

    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        $this->originalMessage = $message;
        parent::__construct($message, $code, $previous);
    }

    public function pushStructureTrace($prefix)
    {
        $this->message = $this->originalMessage . ' (' . implode('->', $this->structureTrace) . ')';
        array_unshift($this->structureTrace, $prefix);
    }

    public function getStructureTrace()
    {
        return $this->structureTrace;
    }
}