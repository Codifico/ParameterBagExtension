<?php

namespace spec\Codifico\ParameterBagExtension\Context\Initializer;

use PhpSpec\ObjectBehavior;
use Codifico\ParameterBagExtension\Bag\ParameterBagInterface;
use Behat\Behat\Context\Context;
use Codifico\ParameterBagExtension\Context\ParameterBagAwareContext;

class ParameterBagAwareInitializerSpec extends ObjectBehavior
{
    function let(ParameterBagInterface $bag)
    {
        $this->beConstructedWith($bag);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Codifico\ParameterBagExtension\Context\Initializer\ParameterBagAwareInitializer');
        $this->shouldHaveType('Behat\Behat\Context\Initializer\ContextInitializer');
    }

    function it_should_not_change_all_contexts(Context $context)
    {
        $this->initializeContext($context);
    }

    function it_should_be_able_to_initialize_context(ParameterBagAwareContext $context, ParameterBagInterface $bag)
    {
        $context->setParameterBag($bag)->shouldBeCalled();
        $this->initializeContext($context);
    }
}
