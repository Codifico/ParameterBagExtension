<?php

namespace Codifico\ParameterBagExtension\Context\Initializer;

use Behat\Behat\Context\Initializer\ContextInitializer;
use Behat\Behat\Context\Context;
use Codifico\ParameterBagExtension\Context\ParameterBagAwareContext;
use Codifico\ParameterBagExtension\Bag\ParameterBagInterface;

class ParameterBagAwareInitializer implements ContextInitializer
{
  private $parameterBag;

  public function __construct(ParameterBagInterface $parameterBag)
  {
    $this->parameterBag = $parameterBag;
  }

  public function initializeContext(Context $context)
  {
    if (!$context instanceof ParameterBagAwareContext && !$this->usesParameterBag($context)) {
      return;
    }

    $context->setParameterBag($this->parameterBag);
  }

  /**
   * Checks whether the context uses the ParameterBagDictionary trait.
   *
   * @param Context $context
   *
   * @return boolean
   */
  private function usesParameterBag(Context $context)
  {
    $refl = new \ReflectionObject($context);
    if (method_exists($refl, 'getTraitNames')) {
      if (in_array('Codifico\\ParameterBagExtension\\Context\\ParameterBagDictionary', $refl->getTraitNames())) {
        return true;
      }
    }

    return false;
  }
}
