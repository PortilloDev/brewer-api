<?php

declare(strict_types=1);

namespace App\Beer\Domain\Exception;


use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Exception;

class BeerNotFoundException extends Exception
{


    public static function fromId(string $id): self
    {
        throw new self(\sprintf('Beer with id %s not found', $id));
    }

    public static function fromFood(string $food): self
    {
        throw new self(\sprintf('Beer with food %s not found', $food));
    }

    public static function fromBeers(): self
    {
        throw new self(\sprintf('Beers not found'));
    }

    public static function fromName(string $name): self
    {
        throw new self(\sprintf('Beer with name %s not found', $name));
    }
}