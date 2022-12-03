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

final class FindBeerForFood
{
    private $repository;

    public function __construct(BeerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $food) :array
    {
        try {
            $beers = [];
            $getDataBeers =  $this->repository->findBeerForFood($food);

            foreach($getDataBeers as $beer) {
            
                $id = new BeerId($beer['id']);
                $name = new BeerName($beer['name']);
                $firstBrewed = new BeerFirstBrewed($beer['first_brewed']);
                $image = new BeerImage($beer['image_url']);
                $tagline = new BeerTagline($beer['tagline']);
                $description = new BeerDescription($beer['description']);

                $beerDto = new BeerDto($id, $name, $firstBrewed, $image, $tagline, $description);
                
                array_push($beers, $beerDto->create());

            }

        } catch(BeerNotFoundException $exception ) {

            throw BeerNotFoundException::fromId($food);
            
        } catch (Exception $exception) {
            
            throw new Exception($exception->getMessage());
        
        }

        return $beers;
    }
}