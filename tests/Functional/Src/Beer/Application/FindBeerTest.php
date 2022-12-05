<?php

declare(strict_types=1);

namespace App\Tests\Functional\Src\Beer\Application;

use App\Beer\Domain\Dto\BeerDto;
use App\Beer\Application\FindBeer;
use App\Beer\Domain\ValueObjects\BeerId;
use App\Beer\Domain\ValueObjects\BeerName;
use App\Beer\Domain\ValueObjects\BeerImage;
use App\Beer\Domain\ValueObjects\BeerTagline;
use App\Beer\Domain\ValueObjects\BeerDescription;
use App\Beer\Domain\ValueObjects\BeerFirstBrewed;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FindBeerTest extends WebTestCase
{
    public function testValidatesThatGetBeerByPassingAnId()
    {
        $idBeerFind = 1;
        
        $findBeerMock = $this->createMock(FindBeer::class);

        $id          = new BeerId($idBeerFind);
        $name        = new BeerName('fakeName');
        $firstBrewed = new BeerFirstBrewed('fake_first_brewed');
        $image       = new BeerImage('fake_image_url');
        $tagline     = new BeerTagline('fake_tagline');
        $description = new BeerDescription('fake_description');

        $findBeerMock->expects(self::once())
        ->method('__invoke')
        ->willReturn(
            new BeerDto($id, $name, $firstBrewed, $image, $tagline, $description)

        );

        $findBeerMock->__invoke($idBeerFind);
    }


}