<?php

namespace Aminevsky\ValidationRuleFormatter;

use Aminevsky\ValidationRuleFormatter\Entity\Rule;
use Aminevsky\ValidationRuleFormatter\Entity\RuleList;

class ValidationRuleFormatter
{
    /** @var RuleList  */
    private $rules;

    /**
     * ValidationRuleFormatter constructor.
     */
    public function __construct()
    {
        $this->rules = new RuleList();
    }

    /**
     *  Add a rule.
     *
     * @param string $attribute
     * @param string $ruleName
     * @param mixed ...$ruleParams
     * @return $this
     */
    public function addRule(string $attribute, string $ruleName, ...$ruleParams): self
    {
        $rule = new Rule($ruleName, $ruleParams);
        $this->rules->add($attribute, $rule);

        return $this;
    }

    /**
     * Return the formatted rules.
     *
     * @return array
     */
    public function format(): array
    {
        return $this->rules->toArray();
    }
}