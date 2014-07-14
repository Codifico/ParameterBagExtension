# ParameterBagExtension

for Behat 3.x

Provides parameter bag for Behat contexts:

* ParameterBagAwareContext provides an parameter bag instance for contexts

## Usage

Prepare data:

```php
class FeatureContext ...
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
```

Use the data:

```php
class AnotherFeatureContext ...
{
    use ParameterBagDictionary;

    /**
     * @Then I need entity :entityName
     */
    public function iNeedEntity($entityName)
    {
      $entity = $this->getParameterBag()->get($entityName);
    }
```

## Copyright

Copyright (c) 2014 Marcin Dryka (drymek).

## Contributors

* Marcin Dryka [drymek](http://github.com/drymek) [lead developer]
* Other [awesome developers](https://github.com/Codifico/ParameterBagExtension/graphs/contributors)
