<?php
declare(strict_types = 1);

namespace App\Beer\Infrastructure;
use App\Beer\Domain\Repository\BeerRepository;

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

        return $this->httpServiceInterface->getData('GET', $endpoint,[]);
  
    }
    public function findBeerForFood(string $field):array
    {

        $endpoint = "v2/beers?food={$field}";

        return $this->httpServiceInterface->getData('GET', $endpoint,[]);
  
    }


    
}