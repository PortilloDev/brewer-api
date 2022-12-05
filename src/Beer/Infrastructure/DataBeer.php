<?php
declare(strict_types = 1);

namespace App\Beer\Infrastructure;
use App\Beer\Domain\Repository\BeerRepository;
use App\Beer\Domain\Exception\BeerNotFoundException;
use App\Shared\Infrastructure\Exception\ClientHttpException;

final class DataBeer implements BeerRepository
{
    private $httpServiceInterface;

    public function __construct(HttpServiceInterface $httpServiceInterface)
    {
            $this->httpServiceInterface = $httpServiceInterface;
    }


    public function findByBeer(int $id):array
    {

        $endpoint = "v2/beers/{$id}";

        try {

            $beer = $this->httpServiceInterface->getData('GET', $endpoint,[]);

        } catch (BeerNotFoundException $exception) {

            throw BeerNotFoundException::fromId((string)$id);

        } catch (ClientHttpException $exception) {
            
            throw new ClientHttpException($exception->getMessage());
        
        }

        return $beer;
  
    }
    public function findBeerForFood(string $food):array
    {

        try {

        $endpoint = "v2/beers?food={$food}";

        $beers = $this->httpServiceInterface->getData('GET', $endpoint,[]);
        
        } catch (BeerNotFoundException $exception) {

            throw BeerNotFoundException::fromFood($food);

        } catch (ClientHttpException $exception) {

            throw new ClientHttpException($exception->getMessage());
        }

        return $beers;

  
    }


    
}