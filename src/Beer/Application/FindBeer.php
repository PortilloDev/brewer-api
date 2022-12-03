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

final class FindBeer
{

    private $repository;

    public function __construct(BeerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $idBeer) :array
    {
        
        
        try {

            $getBeer =  $this->repository->findByBeer($idBeer);

            $id = new BeerId($getBeer[0]['id']);
            $name = new BeerName($getBeer[0]['name']);
            $firstBrewed = new BeerFirstBrewed($getBeer[0]['first_brewed']);
            $image = new BeerImage($getBeer[0]['image_url']);
            $tagline = new BeerTagline($getBeer[0]['tagline']);
            $description = new BeerDescription($getBeer[0]['description']);

        } catch(BeerNotFoundException $exception ) {

            throw BeerNotFoundException::fromId((string)$idBeer);
            
        } catch (Exception $exception) {
            
            throw new Exception($exception->getMessage());
        
        }


        $beerDto = new BeerDto($id, $name, $firstBrewed, $image, $tagline, $description);


        return [$beerDto->create()];
    }
}