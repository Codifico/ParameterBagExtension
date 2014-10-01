<?php

namespace Codifico\ParameterBagExtension\Bag;

class InMemoryPlaceholderBag extends InMemoryParameterBag
{
    /**
     * {@inheritdoc}
     */
    public function set($name, $value)
    {
        if (is_object($value)) {
            throw new \Exception('An object cannot be the value of a placeholder');
        }

        parent::set($name, $value);
    }

    /**
     * @param string $string
     *
     * @return string
     */
    public function replace($string)
    {
        foreach ($this->bag as $key => $value) {
            $string = str_replace($key, $value, $string);
        }

        return $string;
    }
}
