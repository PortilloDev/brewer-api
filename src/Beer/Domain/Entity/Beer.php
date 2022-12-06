<?php

declare(strict_types=1);

namespace App\Beer\Domain\Entity;

use App\Beer\Domain\ValueObjects\BeerDescription;
use App\Beer\Domain\ValueObjects\BeerFirstBrewed;
use App\Beer\Domain\ValueObjects\BeerId;
use App\Beer\Domain\ValueObjects\BeerImage;
use App\Beer\Domain\ValueObjects\BeerName;
use App\Beer\Domain\ValueObjects\BeerTagline;

final class Beer
{

    private BeerId $id;
    private BeerName $name;
    private BeerFirstBrewed $firstBrewed;
    private BeerImage $image;
    private BeerTagline $tagline;
    private BeerDescription $description;

    public function __construct(
        BeerId $id,
        BeerName $name,
        BeerFirstBrewed $firstBrewed,
        BeerImage $image,
        BeerTagline $tagline,
        BeerDescription $description

    ) {

        $this->id = $id;
        $this->name = $name;
        $this->firstBrewed = $firstBrewed;
        $this->image = $image;
        $this->tagline = $tagline;
        $this->description = $description;
    }

    public function getId(): BeerId
    {
        return $this->id;
    }

    public function getName(): BeerName
    {
        return $this->name;
    }

    public function getFirstBrewed(): BeerFirstBrewed
    {
        return $this->firstBrewed;
    }

    public function getImage(): BeerImage
    {
        return $this->image;
    }

    public function getTagline(): BeerTagline
    {
        return $this->tagline;
    }

    public function getDescription(): BeerDescription
    {
        return $this->description;
    }

}