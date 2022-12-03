<?php

declare(strict_types=1);

namespace App\Beer\Domain\ValueObjects;

final class BeerDescrition
{
    private $value;

    public function __construct(string $descrition)
    {
        $this->value = $descrition;
    }

    public function value(): string
    {
        return $this->value;
    }
}