<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Exception;

use Exception;


class ClientHttpException extends Exception
{
    protected $code = 400;
    protected $message = 'Bad Request error `%s`';

    public function __construct(string $error)
    {
        parent::__construct(sprintf($this->message, $error), $this->code);
    }
}