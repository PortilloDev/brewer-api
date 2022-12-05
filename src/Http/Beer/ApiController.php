<?php

declare(strict_types=1);

namespace App\Http\Beer;

use Exception;
use OpenApi\Annotations as OA;
use App\Beer\Domain\Entity\Beer;
use App\Beer\Application\FindBeer;
use App\Beer\Application\FindBeerForFood;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Beer\Infrastructure\HttpServiceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;


class ApiController 
{
    private $findBeer;
    private $findBeerForFood;


    public function __construct(FindBeer $findBeer, FindBeerForFood $findBeerForFood)
    {
        $this->findBeer         = $findBeer;
        $this->findBeerForFood  = $findBeerForFood;
    }

    /**
     * Returns detail of a beer
     * 
     * @OA\GET(
     *  description="Returns detail of a beer",
     * ),
     * * @OA\Response(
     *     response=200,
     *     description="Ok",
     *     content={
     *      @OA\MediaType(
     *      mediaType="application/json",
     *      @OA\Schema(
     *          @OA\Property(
     *              property="id",
     *              type="int",
     *              example=1
     *          ),
     *          @OA\Property(
     *              property="name",
     *              type="string",
     *              example="Bud"
     *          ),
     *          @OA\Property(
     *              property="firstBrewed",
     *              type="string",
     *              example="11/2011"
     *          ),
     *          @OA\Property(
     *              property="image",
     *              type="string",
     *              example="https://images.punkapi.com/v2/50.png",
     *          ),
     *          @OA\Property(
     *              property="tagline",
     *              type="string",
     *              example="Example tagline property"
     *          ),
     *         @OA\Property(
     *              property="description",
     *              type="string",
     *              example="American Beer"
     *          ),
     *        )
     *       )
     *      }   
     * ),
     *  @OA\Response(
     *     response=404,
     *     description="Not found"
     * ),
     *  @OA\Response(
     *     response=400,
     *     description="Bad Request"
     * )
     */
    #[Route('/api/v1/beer/{id<\d+>}', name: 'find_beer', methods: ['GET'])]
    public function findBeer(int $id, Request $request) :JsonResponse
    {
       try {
           
            $beerDto = $this->findBeer->__invoke((int)$id);

       } catch (Exception $exception) {

        return new JsonResponse( $exception->getMessage() , Response::HTTP_NOT_FOUND);

       }
      
        return new JsonResponse( [$beerDto->resource()] , Response::HTTP_OK);
    }



    /**
     *   Returns collection with the details of the recommended beers for a given type of food
     * 
     *  @OA\GET(
     *   description="Returns collection with the details of the recommended beers for a given type of food, if you need to add spaces when indicating a food, simply add an underscore",
     *  ),
     * * @OA\Response(
     *     response=200,
     *     description="Ok",
     *     content={
     *      @OA\MediaType(
     *      mediaType="application/json",
     *      @OA\Schema(
     *          @OA\Property(
     *              property="id",
     *              type="int",
     *              example=1
     *          ),
     *          @OA\Property(
     *              property="name",
     *              type="string",
     *              example="Bud"
     *          ),
     *          @OA\Property(
     *              property="firstBrewed",
     *              type="string",
     *              example="11/2011"
     *          ),
     *          @OA\Property(
     *              property="image",
     *              type="string",
     *              example="https://images.punkapi.com/v2/50.png",
     *          ),
     *          @OA\Property(
     *              property="tagline",
     *              type="string",
     *              example="Example tagline property"
     *          ),
     *         @OA\Property(
     *              property="description",
     *              type="string",
     *              example="American Beer"
     *          ),
     *        )
     *       )
     *      }   
     * ),
     *  @OA\Response(
     *     response=404,
     *     description="Not found"
     * ),
     *  @OA\Response(
     *     response=400,
     *     description="Bad Request"
     * )
     */
    #[Route('/api/v1/beer/food/{food}', name: 'find_eat_for_beer', methods: ['GET'])]
    public function findEatForBeer(string $food, Request $request) :JsonResponse
    {

        try {

            $food = str_replace(' ', '_', $food);
            
            $response = $this->findBeerForFood->__invoke($food);

        } catch (Exception $exception) {

            return new JsonResponse( $exception->getMessage() , Response::HTTP_NOT_FOUND);

        }

        return new JsonResponse( $response , Response::HTTP_OK);
    }

    #[Route('/', name: 'route', methods: ['GET'])]
    public function myRedirectAction()
    {
        return new RedirectResponse('/api/doc');
    }
}