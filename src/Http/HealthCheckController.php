<?php

declare (strict_types = 1);

namespace App\Http;

use OpenApi\Annotations as OA;
use Psr\Cache\CacheItemInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;

class HealthCheckController
{

    /**
     *
     * Health status App.
     *
     * @OA\Response(
     *     response=200,
     *     description="verify that the application is up",
     *     @OA\JsonContent(
     *        type="string",
     *        example="Brewer up and running",
     *     )
     * )
     */
    #[Route('/api/v1/check', name:'check', methods:['GET'])]
    function check(CacheInterface $cache): JsonResponse
    {
        $response = $cache->get('check', function (CacheItemInterface $cacheItemInterface) {
          
          $cacheItemInterface->expiresAfter(5);
          
          return [
                    'message' => 'Brewer up and running',
                ];

        });

        return new JsonResponse($response);
    }
}
