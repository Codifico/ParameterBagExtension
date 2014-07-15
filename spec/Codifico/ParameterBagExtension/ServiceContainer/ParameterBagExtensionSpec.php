<?php

namespace spec\Codifico\ParameterBagExtension\ServiceContainer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ParameterBagExtensionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Codifico\ParameterBagExtension\ServiceContainer\ParameterBagExtension');
    }
}
