<?php

namespace spec\Codifico\ParameterBagExtension\Bag;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InMemoryParameterBagSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Codifico\ParameterBagExtension\Bag\InMemoryParameterBag');
        $this->shouldHaveType('Codifico\ParameterBagExtension\Bag\ParameterBagInterface');
    }

    function it_should_be_able_to_hold_parameters()
    {
        $this->set('name', 'value');
        $this->get('name')->shouldReturn('value');
    }

    function it_should_report_missing_parameter()
    {
        $this->shouldThrow(new \Exception("Parameter name2 not set"))->duringGet('name2');
    }
}
