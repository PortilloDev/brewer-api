<?php

declare(strict_types=1);

namespace App\Beer\Domain\ValueObjects;

final class BeerName
{
    private $value;

    public function __construct(string $name)
    {
        $this->value = $name;
    }

    public function value(): string
    {
        return $this->value;
    }
}