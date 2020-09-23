<?php

namespace Aminevsky\ValidationRuleFormatter\Tests\Entity;

use Aminevsky\ValidationRuleFormatter\Entity\Rule;
use Aminevsky\ValidationRuleFormatter\Entity\RuleList;
use PHPUnit\Framework\TestCase;

class RuleListTest extends TestCase
{
    public function testConvertToArray()
    {
        $rules = new RuleList();
        $rules->add('attribute1', new Rule('max', [1000]));
        $rules->add('attribute2', new Rule('required'));
        $actual = $rules->toArray();

        $this->assertIsArray($actual);

        $expected = [
            'attribute1' => ['max:1000'],
            'attribute2' => ['required'],
        ];

        $this->assertSame($expected, $actual);
    }
}