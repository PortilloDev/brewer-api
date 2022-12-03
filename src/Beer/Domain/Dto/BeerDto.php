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
    }
    public function create(): array
    {

        $beer = new Beer(
            $this->id,
            $this->name,
            $this->firstBrewed,
            $this->image,
            $this->tagline,
            $this->description
        );

        return [ 
            'id' => $beer->getId()->value(),
            'name' => $beer->getName()->value(),
            'description' => $beer->getDescription()->value(),
            'fistBrewed' => $beer->getFirstBrewed()->value(),
            'image' => $beer->getImage()->value(),
            'tagLine' => $beer->getTagline()->value(),
        ];

    }

}
