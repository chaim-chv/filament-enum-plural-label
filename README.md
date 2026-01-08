# filament-enum-plural-label

A small Laravel + Filament helper library that allows PHP enums to expose
a plural label for use in Filament resources, navigation, and tables.

This package provides a single contract. It does not register hooks,
override Filament behavior, or add magic.

## Requirements

- PHP 8.1+
- Laravel 10 or 11
- Filament v3+

## Installation

```bash
composer require chaim-chv/filament-enum-plural-label
```

## Usage

Define an enum that implements the contract:

```php
use FilamentEnumPluralLabel\Contracts\HasPluralLabel;

enum UserRole: string implements HasPluralLabel
{
    case Admin = 'admin';
    case Editor = 'editor';
    case Viewer = 'viewer';

    public function getPluralLabel(): string
    {
        return match ($this) {
            self::Admin => 'Administrators',
            self::Editor => 'Editors',
            self::Viewer => 'Viewers',
        };
    }
}
```

## Filament example

```php
public static function getPluralModelLabel(): string
{
    $role = UserRole::tryFrom(request('role'));

    if ($role instanceof HasPluralLabel) {
        return $role->getPluralLabel();
    }

    return 'Users';
}
```

@chaim-chv © 2026
