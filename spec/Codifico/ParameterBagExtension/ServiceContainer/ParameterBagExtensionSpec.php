<?php

namespace spec\Codifico\ParameterBagExtension\ServiceContainer;

use PhpSpec\ObjectBehavior;

class ParameterBagExtensionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Codifico\ParameterBagExtension\ServiceContainer\ParameterBagExtension');
    }
}
