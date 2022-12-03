<?php

declare(strict_types=1);

namespace App\Beer\Domain\ValueObjects;

final class BeerFirstBrewed
{
    private $value;

    public function __construct(string $firstBrewed)
    {
        $this->value = $firstBrewed;
    }

    public function value(): string
    {
        return $this->value;
    }
}