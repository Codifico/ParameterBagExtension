<?php

namespace Codifico\ParameterBagExtension\Context;

use Codifico\ParameterBagExtension\Bag\ParameterBagInterface;

trait ParameterBagDictionary
{
    private $parameterBag;

    public function setParameterBag(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    public function getParameterBag()
    {
        return $this->parameterBag;
    }
}
