<?php 
declare(strict_types=1);

namespace App\Beer\Application;

use App\Beer\Domain\Dto\BeerDto;
use App\Beer\Domain\Dto\BeerDtoCollection;
use App\Beer\Domain\Repository\BeerRepository;
final class FindBeerForFood
{
    private $repository;

    public function __construct(BeerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $food) :array
    {
        $beers = new BeerDto();
        
        $getDataBeers =  $this->repository->findBeerForFood($food);

        return $beers($getDataBeers);
    }
}