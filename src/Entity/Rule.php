<?php

namespace Aminevsky\ValidationRuleFormatter\Entity;

class Rule
{
    /** @var string */
    private $name;

    /** @var array */
    private $parameters;

    /**
     * Rule constructor.
     *
     * @param string $name
     * @param array $parameters
     */
    public function __construct(string $name, array $parameters = [])
    {
        $this->name = $name;
        $this->parameters = $parameters;
    }

    /**
     * Convert to string.
     *
     * @return string
     */
    public function toString(): string
    {
        if (count($this->parameters) === 0) {
            return $this->name;
        }

        return $this->name . ':' . implode(',', $this->parameters);
    }
}