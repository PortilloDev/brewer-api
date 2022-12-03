<?php

declare(strict_types=1);

namespace App\Beer\Domain\ValueObjects;

final class BeerDescription
{
    private $value;

    public function __construct(string $description)
    {
        $this->value = $description;
    }

    public function value(): string
    {
        return $this->value;
    }
}