<?php

namespace Codifico\ParametersBagExtension\Context;

use Behat\Behat\Context\Context;
use Codifico\ParameterBagExtension\Bag\ParameterBagInterface;

interface ParameterBagAwareContext extends Context
{
  public function setParameterBag(ParameterBagInterface $parameterBag);
}