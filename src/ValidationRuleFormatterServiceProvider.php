<?php

namespace Aminevsky\ValidationRuleFormatter;

use Illuminate\Support\ServiceProvider;

class ValidationRuleFormatterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('validation-rule-formatter', function ($app) {
            return new ValidationRuleFormatter();
        });
    }
}