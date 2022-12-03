<?php

declare(strict_types=1);

namespace App\Beer\Domain\ValueObjects;

final class BeerImage
{
    private $value;

    public function __construct(string $image)
    {
        $this->value = $image;
    }

    public function value(): string
    {
        return $this->value;
    }
}