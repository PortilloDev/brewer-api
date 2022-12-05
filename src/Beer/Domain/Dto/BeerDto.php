<?php
declare (strict_types = 1);

namespace App\Beer\Domain\Dto;

use App\Beer\Domain\Entity\Beer;
use App\Beer\Domain\ValueObjects\BeerDescription;
use App\Beer\Domain\ValueObjects\BeerFirstBrewed;
use App\Beer\Domain\ValueObjects\BeerId;
use App\Beer\Domain\ValueObjects\BeerImage;
use App\Beer\Domain\ValueObjects\BeerName;
use App\Beer\Domain\ValueObjects\BeerTagline;

final class BeerDto
{

    private $id;
    private $firstBrewed;
    private $image;
    private $name;
    private $tagline;
    private $description;

    private $beerModel;
    
    public function __construct(
        BeerId           $id,
        BeerName         $name,
        BeerFirstBrewed  $firstBrewed,
        BeerImage        $image,
        BeerTagline      $tagline,
        BeerDescription  $description
    )
    {
        $this->id            = $id;
        $this->name          = $name;
        $this->firstBrewed   = $firstBrewed;
        $this->image         = $image;
        $this->tagline       = $tagline;
        $this->description   = $description;

        $this->create();
    }
    private function create(): void
    {

        $this->beerModel = new Beer(
            $this->id,
            $this->name,
            $this->firstBrewed,
            $this->image,
            $this->tagline,
            $this->description
        );

    }

    public function resource() :array
    {
        return [ 
            'id' => $this->beerModel->getId()->value(),
            'name' => $this->beerModel->getName()->value(),
            'description' => $this->beerModel->getDescription()->value(),
            'firstBrewed' => $this->beerModel->getFirstBrewed()->value(),
            'image' => $this->beerModel->getImage()->value(),
            'tagLine' => $this->beerModel->getTagline()->value(),
        ];
    }

}
