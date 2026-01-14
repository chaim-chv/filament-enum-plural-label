<?php

namespace FilamentEnumPluralLabel\Contracts;

use Illuminate\Contracts\Support\Htmlable;

interface HasPluralLabel
{
  public function getPluralLabel(): string|Htmlable|null;
}
