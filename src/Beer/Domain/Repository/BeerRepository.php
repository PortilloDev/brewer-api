<?php

declare(strict_types=1);

namespace App\Beer\Domain\Repository;

interface BeerRepository
{
    public function findByBeer(int $id): array;

    public function findBeerForFood(string $food): array;

    public function getBeers(): array;
    
    public function findBeerForName(string $name): array;
}