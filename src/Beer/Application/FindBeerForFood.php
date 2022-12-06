<?php
declare(strict_types=1);

namespace App\Beer\Application;

use Exception;
use App\Beer\Domain\Dto\BeerDto;
use App\Beer\Domain\ValueObjects\BeerId;
use App\Beer\Domain\ValueObjects\BeerName;
use App\Beer\Domain\ValueObjects\BeerImage;
use App\Beer\Domain\ValueObjects\BeerTagline;
use App\Beer\Domain\Repository\BeerRepository;
use App\Beer\Domain\ValueObjects\BeerDescription;
use App\Beer\Domain\ValueObjects\BeerFirstBrewed;
use App\Beer\Domain\Exception\BeerNotFoundException;

class FindBeerForFood
{
    private $repository;

    public function __construct(BeerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $food): array
    {
        try {
            $beers = [];
            $getDataBeers = $this->repository->findBeerForFood($food);

            foreach ($getDataBeers as $beer) {

                $id = new BeerId($beer['id']);
                $name = new BeerName($beer['name']);
                $firstBrewed = new BeerFirstBrewed($beer['first_brewed']);
                $image = new BeerImage(isset($beer['image_url']) ? $beer['image_url'] : 'not image');
                $tagline = new BeerTagline($beer['tagline']);
                $description = new BeerDescription($beer['description']);

                $beerDto = new BeerDto($id, $name, $firstBrewed, $image, $tagline, $description);

                array_push($beers, $beerDto->resource());

            }

        } catch (Exception $exception) {

            throw BeerNotFoundException::fromFood($food);

        }

        return $beers;
    }
}