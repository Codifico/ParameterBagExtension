<?php

namespace Codifico\ParameterBagExtension\Bag;

interface ParameterBagInterface
{
  public function set($name, $value);
  public function get($name);
}
