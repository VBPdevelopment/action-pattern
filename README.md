# Action Pattern

Actions are meant to be very small, single purpose, bits of code.

Because of the small footprint actions are easy reusable.

Example use cases are:
- implementing third paty api calls
- Simple routine jobs

## Installation

```bash
composer require vertaalbureau-perfect/action-pattern
```

## Creating an Action

```bash
php artisan make:action [ActionName]
```

You can also create actions in sub namespaces:

```bash
php artisan make:action [SubNamespace]/[ActionName]
```

Actions are placed in your app/Actions folder.

## Usage

Imagine a simple action to write something to the log:
```php
class CreateLogAction extends AbstractAction
{
    public function handle($message)
    {
        Log::debug($message);
    }
}
```

And to use it we would simply call:
```php
CreateLogAction::execute('Write me to the log please!');
```

## Testing

For Testing purposes you can use the static fake method.

```php
CreateLogAction::fake();
```

If your code depends on a return value from the action you can provide the return value in the fake method.
```php
CreateLogAction::fake('Log Success');
```
