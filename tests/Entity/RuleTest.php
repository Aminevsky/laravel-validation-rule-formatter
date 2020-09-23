<?php

namespace Aminevsky\ValidationRuleFormatter\Tests\Entity;

use Aminevsky\ValidationRuleFormatter\Entity\Rule;
use PHPUnit\Framework\TestCase;

class RuleTest extends TestCase
{
    /**
     * @dataProvider provideDataRuleParams
     */
    public function testGetsRuleString(string $name, array $params, string $expected)
    {
        $rule = new Rule($name, $params);

        $this->assertSame($expected, $rule->toString());
    }

    public function provideDataRuleParams()
    {
        return [
            '2 Params' => [
                'required_with',
                ['attribute1', 'attribute2'],
                'required_with:attribute1,attribute2',
            ],
            '1 param' => [
                'max',
                [1000],
                'title' => 'max:1000',
            ],
            'No params' => [
                'required',
                [],
                'title' => 'required',
            ],
        ];
    }
}