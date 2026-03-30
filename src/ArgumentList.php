<?php
namespace CodeGen;

use ArrayAccess;
use ArrayIterator;
use IteratorAggregate;
use Traversable;

/**
 * Argument list for function call
 */
class ArgumentList implements Renderable, ArrayAccess, IteratorAggregate
{
    protected $arguments;

    public function __construct(array $arguments = array())
    {
        $this->arguments = $arguments;
    }

    public function setArguments(array $args)
    {
        $this->arguments = $args;
    }

    public function add($arg)
    {
        $this->arguments[] = $arg;
        return $this;
    }


    public function offsetExists($offset): bool
    {
        return isset($this->arguments[$offset]);
    }

    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->arguments[$offset];
    }

    public function offsetUnset($offset): void
    {
        unset($this->arguments[$offset]);
    }

    public function offsetSet($offset, $value): void
    {
        if ($offset) {
            $this->arguments[$offset] = $value;
        } else {
            $this->arguments[] = $value;
        }
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->arguments);
    }

    public function render(array $args = array())
    {
        $strs = array();
        foreach ($this->arguments as $arg) {
            $strs[] = VariableDeflator::deflate($arg);
        }
        return implode(', ', $strs);
    }
}
