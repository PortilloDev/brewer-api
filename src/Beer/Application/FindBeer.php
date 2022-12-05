<?php
declare(strict_types=1);

namespace App\Beer\Application;

use App\Beer\Domain\Dto\BeerDto;
use App\Beer\Domain\Repository\BeerRepository;
use App\Beer\Domain\Exception\BeerNotFoundException;
use App\Shared\Infrastructure\Exception\ClientHttpException;
use App\Beer\Domain\ValueObjects\BeerDescription;
use App\Beer\Domain\ValueObjects\BeerFirstBrewed;
use App\Beer\Domain\ValueObjects\BeerId;
use App\Beer\Domain\ValueObjects\BeerImage;
use App\Beer\Domain\ValueObjects\BeerName;
use App\Beer\Domain\ValueObjects\BeerTagline;
use Exception;

class FindBeer
{

    private $repository;

    public function __construct(BeerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $idBeer) :BeerDto
    {
        
        
        try {

            $getBeer =  $this->repository->findByBeer($idBeer);

            foreach($getBeer as $beer) {

                $id = new BeerId($beer['id']);
                $name = new BeerName($beer['name']);
                $firstBrewed = new BeerFirstBrewed($beer['first_brewed']);
                $image = new BeerImage(isset($beer['image_url']) ? $beer['image_url']: 'not image' );
                $tagline = new BeerTagline($beer['tagline']);
                $description = new BeerDescription($beer['description']);
            }

        } catch(Exception $exception ) {

            throw BeerNotFoundException::fromId((string)$idBeer);
            
        } 

        $beerDto = new BeerDto($id, $name, $firstBrewed, $image, $tagline, $description);


        return $beerDto;
    }
}