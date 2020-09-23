<?php

namespace Aminevsky\ValidationRuleFormatter;

use Illuminate\Support\Facades\Facade;

class ValidationRuleFormatterFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'validation-rule-formatter';
    }
}