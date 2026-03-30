<?php
namespace CodeGen;

use ArrayAccess;

class ClassMethod extends UserFunction implements Renderable, ArrayAccess
{
    public $scope = 'public';

    public function setScope($scope)
    {
        $this->scope = $scope;
    }

    /**
     * @param array $args
     * @return string
     */
    public function render(array $args = array())
    {
        $block = $this->getBlock();
        $block->setIndentLevel($this->indentLevel);
        return Indenter::indent($this->indentLevel) . $this->scope . ' function ' . $this->name . '(' . $this->renderArguments() . ")\n"
        . $block->render($args);
    }

    public function __toString()
    {
        return $this->render();
    }

    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->block[] = $value;
        } else {
            $this->block[$offset] = $value;
        }
    }

    public function offsetExists($offset): bool
    {
        return isset($this->block[$offset]);
    }

    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->block[$offset];
    }

    public function offsetUnset($offset): void
    {
        unset($this->block[$offset]);
    }


}
