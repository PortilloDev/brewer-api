<?php

declare(strict_types=1);

namespace App\Beer\Infrastructure;

interface HttpServiceInterface
{
    public function getData(string $method, string $endpoint, ?array $options): array;
}