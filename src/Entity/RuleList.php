<?php

namespace Aminevsky\ValidationRuleFormatter\Entity;

class RuleList
{
    /** @var array */
    private $rules;

    /**
     * Add a rule.
     *
     * @param string $attribute
     * @param Rule $rule
     * @return $this
     */
    public function add(string $attribute, Rule $rule): self
    {
        $this->rules[$attribute][] = $rule;

        return $this;
    }

    /**
     * Convert to array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $rules = [];

        foreach ($this->rules as $attribute => $ruleParams) {
            $rules[$attribute] = $this->rulesToStringArray($ruleParams);
        }

        return $rules;

    }

    /**
     * Convert rules to array of string.
     *
     * @param array $rules
     * @return array
     */
    private function rulesToStringArray(array $rules): array
    {
        return array_map(function ($rule) {
            return $rule->toString();
        }, $rules);
    }
}