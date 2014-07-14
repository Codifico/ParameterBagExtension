<?php

namespace Codifico\ParameterBagExtension\Bag;

class InMemoryParameterBag implements ParameterBagInterface {
  
  private $bag = [];

  public function set($name, $value) {
    $this->bag[$name] = $value;
  }

  public function get($name) {
    return $this->bag[$name];
  }
}