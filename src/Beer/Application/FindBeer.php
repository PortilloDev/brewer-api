<?php
declare(strict_types=1);

namespace App\Beer\Application;

use App\Beer\Domain\Dto\BeerDto;
use App\Beer\Domain\Dto\BeerDtoCollection;
use App\Beer\Domain\Repository\BeerRepository;


final class FindBeer
{

    private $repository;

    public function __construct(BeerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $id) :array
    {
        $beer = new BeerDto();
        
        $getBeer =  $this->repository->findByBeer($id);
        
        return $beer($getBeer);
    }
}