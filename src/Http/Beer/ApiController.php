<?php

declare(strict_types=1);

namespace App\Http\Beer;

use App\Beer\Application\FindBeer;
use App\Beer\Application\FindBeerForFood;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Beer\Infrastructure\HttpServiceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController 
{
    private HttpServiceInterface $httpServiceInterface;

    private $findBeer;
    private $findBeerForFood;


    public function __construct(FindBeer $findBeer, FindBeerForFood $findBeerForFood)
    {
        $this->findBeer         = $findBeer;
        $this->findBeerForFood  = $findBeerForFood;
    }


    #[Route('/api/v1/beer/{id<\d+>}', name: 'find_beer', methods: ['GET'])]
    public function findBeer(int $id, Request $request) :JsonResponse
    {
       
        $response = $this->findBeer->__invoke((int)$id);
      
        return new JsonResponse( $response , Response::HTTP_OK);
    }


    #[Route('/api/v1/beer/food/{food}', name: 'find_eat_for_beer', methods: ['GET'])]
    public function findEatForBeer(string $food, Request $request) :JsonResponse
    {
       $response = $this->findBeerForFood->__invoke($food);

        return new JsonResponse( $response , Response::HTTP_OK);
    }
}