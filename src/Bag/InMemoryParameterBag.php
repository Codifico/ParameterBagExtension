<?php

namespace Codifico\ParameterBagExtension\Bag;

class InMemoryParameterBag implements ParameterBagInterface
{
    protected $bag = [];

    /**
     * {@inheritdoc}
     */
    public function set($name, $value)
    {
        $this->bag[$name] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function get($name)
    {
        if (isset($this->bag[$name])) {
            return $this->bag[$name];
        }

        throw new \Exception(sprintf('Parameter %s not set', $name));
    }

    public function getAll()
    {
        return $this->bag;
    }
}
