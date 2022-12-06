<?php

declare (strict_types=1);

namespace App\Http;

use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HealthCheckController
{

    /**
     *
     * Health status App.
     *
     * @Route("/api/v1/check", name="check", methods={"GET"})
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
    function check(): JsonResponse
    {

        return new JsonResponse( [
            'message' => 'Brewer up and running',
        ]);
    }
}
