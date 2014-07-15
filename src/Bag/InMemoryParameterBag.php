<?php

namespace Codifico\ParameterBagExtension\Bag;

class InMemoryParameterBag implements ParameterBagInterface
{
  private $bag = [];

  public function set($name, $value)
  {
    $this->bag[$name] = $value;
  }

  public function get($name)
  {
    if (isset($this->bag[$name])) {
        return $this->bag[$name];
    }
    throw new \Exception(sprintf('Parameter %s not set', $name));
  }
}
