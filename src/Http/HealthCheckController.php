<?php 

declare(strict_types=1);

namespace App\Http;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Annotations as OA;

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
    #[Route('/api/v1/check', name: 'check', methods: ['GET'])]
  public function check() :JsonResponse
  {
      return new JsonResponse(
        [
          'message' => 'Brewer up and running',
        ]
      );
  }
}