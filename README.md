A Formatter of Laravel Validation Rule

## Requirements

- PHP ^7.3
- Laravel ^7.0 | ^8.0

## Installation

```
composer require aminevsky/laravel-validation-rule-formatter
```

## Features

This formats validation rules that are passed to Laravel's validator.

## Classes and Methods
### `ValidationRuleFormatter`
#### `addRule()`

Add a rule for specified attribute.

- Parameters
  - Attribute
    - **(Required)** String
    - Attribute Name that the rule applies to
  - Rule Name
    - **(Required)** String
    - Rule name (ex. `required`, `max`)
  - Rule Parameters
    - (Optional) Mixed, Variable arguments
    - Parameters for the rule
- Return value
  - Self (`ValidationRuleFormatter` instance)

#### `format()`

Return formatted rules.

- Parameters
  - None
- Return value
  - Array
  - This can be passed to Laravel's validator

## Example
### Before

Without this library, you would write like this:

```php
class TodoController extends Controller
{
    const TITLE_MAX_LENGTH = 1000;

    public function store(Request $request)
    {
        $request->validate([
            'title'     => ['required', 'max:' . self::TITLE_MAX_LENGTH],
        ]);

        // ...
    }
}
```

### After

With this library, you can write like this:

```php
class TodoController extends Controller
{
    const TITLE_MAX_LENGTH = 1000;

    public function store(Request $request)
    {
        // Add validation rules.
        $rules = ValidationRuleFormatter::addRule('title', 'required')
            ->addRule('title', 'max', self::TITLE_MAX_LENGTH)
           // Format rules.              
            ->format();

        // Pass formatted rules to default validator.
        $request->validate($rules);

        // ...
    }
}
```
