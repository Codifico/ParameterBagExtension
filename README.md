# ParameterBagExtension

for Behat 3.x

[![Build Status](https://travis-ci.org/Codifico/ParameterBagExtension.svg?branch=master)](https://travis-ci.org/Codifico/ParameterBagExtension)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Codifico/ParameterBagExtension/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Codifico/ParameterBagExtension/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/486c4839-73b1-400e-ae5f-456c82498386/mini.png)](https://insight.sensiolabs.com/projects/486c4839-73b1-400e-ae5f-456c82498386)
[![Latest Stable Version](https://poser.pugx.org/codifico/parameter-bag-extension/v/stable.svg)](https://packagist.org/packages/codifico/parameter-bag-extension) 
[![Total Downloads](https://poser.pugx.org/codifico/parameter-bag-extension/downloads.svg)](https://packagist.org/packages/codifico/parameter-bag-extension) 
[![Latest Unstable Version](https://poser.pugx.org/codifico/parameter-bag-extension/v/unstable.svg)](https://packagist.org/packages/codifico/parameter-bag-extension) [![License](https://poser.pugx.org/codifico/parameter-bag-extension/license.svg)](https://packagist.org/packages/codifico/parameter-bag-extension)

Provides parameter bag for Behat contexts:

* ParameterBagAwareContext provides an parameter bag instance for contexts

## Instalation

```bash
php composer.phar require codifico/parameter-bag-extension:dev-master --dev
```

## Usage

Prepare parameter:

```php
<?php
        
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Codifico\ParameterBagExtension\Context\ParameterBagDictionary;

class FeatureContext implements SnippetAcceptingContext
{
    use ParameterBagDictionary;

    /**
     * @Given Entity :entityName exists:
     */
    public function entityExists($entityName)
    {
        // ... create entity
        $this->getParameterBag()->set($entityName, $entity);
    }
}
```

Use the parameter:

```php
<?php
        
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Codifico\ParameterBagExtension\Context\ParameterBagDictionary;

class AnotherFeatureContext implements SnippetAcceptingContext
{
    use ParameterBagDictionary;
    
    /**
     * @Then I need entity :entityName
     */
    public function iNeedEntity($entityName)
    {
      $entity = $this->getParameterBag()->get($entityName);
    }
}
```

## Copyright

Copyright (c) 2014 Marcin Dryka (drymek). See LICENSE for details.

## Thanks

Extension is based on a solution developed by [Przemysław Piechota (kibao)](https://gist.github.com/kibao) in [gist](https://gist.github.com/drymek/9539dc04b44adb810471).

## Contributors

* Marcin Dryka [drymek](http://github.com/drymek) [lead developer]
* Other [awesome developers](https://github.com/Codifico/ParameterBagExtension/graphs/contributors)
