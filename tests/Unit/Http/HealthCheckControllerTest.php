<?php 

namespace App\Tests\Unit\Http;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HealthCheckControllerTest extends WebTestCase
{
    protected const ENDPOINT = '/api/v1/check';
 
    public function testHealthCheck() :void
    {
        $client = static::createClient([], [
            'CONTENT_TYPE' => 'application/json',
            'HTTP_ACCEPT' => 'application/json'
            ]
        );
        $client->request('GET', self::ENDPOINT);

        $response =  $client->getResponse();

        self::assertEquals(JsonResponse::HTTP_OK, $response->getStatusCode());
    }
}