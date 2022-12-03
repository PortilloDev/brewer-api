<?php
declare(strict_types=1);

namespace App\Beer\Domain\Dto;

final class BeerDto
{
    public function __invoke(array $beer) :array
    {
        
        return $beer;
    }
}