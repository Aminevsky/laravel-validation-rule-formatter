<?php

namespace Aminevsky\ValidationRuleFormatter\Tests;

use ValidationRuleFormatter;
use Aminevsky\ValidationRuleFormatter\ValidationRuleFormatterFacade;
use Aminevsky\ValidationRuleFormatter\ValidationRuleFormatterServiceProvider;

class ValidationRuleFormatterTest extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ValidationRuleFormatterServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'ValidationRuleFormatter' => ValidationRuleFormatterFacade::class,
        ];
    }

    public function testGetRules()
    {
        $actual = ValidationRuleFormatter::addRule('attribute1', 'required')
            ->addRule('attribute2', 'required')
            ->addRule('attribute2', 'max', 1000)
            ->addRule('attribute3', 'required_with', 'attribute1', 'attribute2')
            ->format();

        $this->assertIsArray($actual);

        $expected = [
            'attribute1' => ['required'],
            'attribute2' => ['required', 'max:1000'],
            'attribute3' => ['required_with:attribute1,attribute2'],
        ];
        $this->assertSame($expected, $actual);
    }
}