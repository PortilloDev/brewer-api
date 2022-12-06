<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure;


use GuzzleHttp\Client;
use App\Shared\Infrastructure\Exception\ClientHttpException;
use App\Beer\Infrastructure\HttpServiceInterface;
use Exception;

class PunkApiClient implements HttpServiceInterface
{
    private Client $client;
    private string $baseUri;

    public function __construct(string $punkApiBaseUri)
    {
        $this->client = new Client(['base_uri' => $punkApiBaseUri]);

    }

    public function getData(string $method, string $endpoint, ?array $options): array
    {

        try {

            $response = $this->client->request($method, $endpoint);

        } catch (ClientHttpException $exception) {

            throw new ClientHttpException($exception->getMessage());

        } catch (Exception  $exception) {

            throw new Exception($exception->getMessage());
        }


        return json_decode($response->getBody()->getContents(), true);


    }
}