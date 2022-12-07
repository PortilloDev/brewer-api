<?php

declare(strict_types=1);

namespace App\Http\Beer;

use Exception;
use OpenApi\Annotations as OA;
use Psr\Cache\CacheItemInterface;
use App\Beer\Application\FindBeer;
use App\Beer\Application\FindBeerForFood;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ApiController
{
    private $findBeer;
    private $findBeerForFood;


    public function __construct(FindBeer $findBeer, FindBeerForFood $findBeerForFood)
    {
        $this->findBeer = $findBeer;
        $this->findBeerForFood = $findBeerForFood;
    }

    /**
     * Returns detail of a beer
     *
     * @Route("/api/v1/beer/{id<\d+>}", name="find_beer", methods={"GET"})
     *
     * @OA\Get(
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
     * @OA\Response(
     *     response=404,
     *     description="Not found"
     * ),
     * @OA\Response(
     *     response=400,
     *     description="Bad Request"
     * )
     */

    public function findBeer(int $id, Request $request, CacheInterface $cache): JsonResponse
    {
        $findBeer = $this->findBeer;

        try {

            $response = $cache->get("findBeer-{$id}", function (CacheItemInterface $cacheItemInterface) use ($findBeer, $id) {

                $cacheItemInterface->expiresAfter(5);

                $beerDto = $findBeer->__invoke((int)$id);

                return [$beerDto->resource()];

            });


        } catch (Exception $exception) {

            return new JsonResponse($exception->getMessage(), Response::HTTP_NOT_FOUND);

        }

        return new JsonResponse($response, Response::HTTP_OK);
    }


    /**
     *   Returns collection with the details of the recommended beers for a given type of food
     *
     * @Route("/api/v1/beer/food/{food}", name="find_eat_for_beer", methods={"GET"})
     *
     * @OA\Get(
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
     * @OA\Response(
     *     response=404,
     *     description="Not found"
     * ),
     * @OA\Response(
     *     response=400,
     *     description="Bad Request"
     * )
     */

    public function findEatForBeer(string $food, Request $request, CacheInterface $cache): JsonResponse
    {

        $findBeerForFood = $this->findBeerForFood;
        try {

            $food = str_replace(' ', '_', $food);

            $response = $cache->get("findEatForBeer-{$food}",
                function (CacheItemInterface $cacheItemInterface) use ($findBeerForFood, $food) {

                    $cacheItemInterface->expiresAfter(5);

                    $beersDto = $findBeerForFood->__invoke($food);

                    return $beersDto;

                });

            $response = $this->findBeerForFood->__invoke($food);

        } catch (Exception $exception) {

            return new JsonResponse($exception->getMessage(), Response::HTTP_NOT_FOUND);

        }

        return new JsonResponse($response, Response::HTTP_OK);
    }

    /**
     *  @Route("/", name="route", methods={"GET"})
     *
     */
    public function myRedirectAction()
    {
        return new RedirectResponse('/api/doc');
    }
}
