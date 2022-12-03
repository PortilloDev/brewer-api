<?php

declare(strict_types=1);

namespace App\Beer\Domain\ValueObjects;

final class BeerTagline
{
    private $value;

    public function __construct(string $tagline)
    {
        $this->value = $tagline;
    }

    public function value(): string
    {
        return $this->value;
    }
}