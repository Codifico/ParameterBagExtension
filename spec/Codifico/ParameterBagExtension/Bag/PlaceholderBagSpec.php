<?php

namespace spec\Codifico\ParameterBagExtension\Bag;

use PhpSpec\ObjectBehavior;

class PlaceholderBagSpec extends ObjectBehavior
{
    function it_should_be_a_parameter_bag()
    {
        $this->shouldHaveType('Codifico\ParameterBagExtension\Bag\ParameterBagInterface');
    }

    function it_should_be_able_to_hold_placeholders()
    {
        $this->set('name', 'value');
        $this->get('name')->shouldReturn('value');
    }

    function it_should_not_be_able_to_hold_objects($object)
    {
        $this->shouldThrow(new \Exception('An object cannot be the value of a placeholder'))
            ->duringSet('name', $object);
    }

    function it_should_report_missing_parameter()
    {
        $this->shouldThrow(new \Exception('Parameter name2 not set'))->duringGet('name2');
    }

    function it_should_replace_all_placeholders_in_string()
    {
        $this->set('user_id', '1');
        $this->set('content_id', '2');

        $this->replace('The user (user_id) is not allowed to see this content (content_id)')
            ->shouldReturn('The user (1) is not allowed to see this content (2)');
    }
}
