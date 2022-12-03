<?php

declare(strict_types=1);

namespace App\Beer\Domain\Exception;


use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BeerNotFoundException extends NotFoundHttpException
{

    private const MESSAGE = 'Beer with id %s not found';

    public static function fromId(string $id) : self
    {
        throw new self(\sprintf(self::MESSAGE, $id));
    }
}