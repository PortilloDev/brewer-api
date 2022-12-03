<?php 

declare(strict_types=1);

namespace App\Http;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


class HealthCheckController
{



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