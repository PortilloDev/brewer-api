<?php

declare(strict_types=1);

namespace App\Tests\Functional\Src\Beer\Application;

use App\Beer\Application\FindBeerForFood;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FindBeerForFoodTest extends WebTestCase 
{
  
    public function testValidatesThatGetBeerByPassingAnFood()
    {
        $food = "cranberry";
        $findBeerForFoodMock = $this->createMock(FindBeerForFood::class);

        $findBeerForFoodMock->expects(self::once())
        ->method('__invoke')
        ->willReturn(
            [
                 [
                "id"=> 1,
                "name"=> "fakeName",
                "description"=> "fake_description",
                "fistBrewed"=> "fake_first_brewed",
                "image"=> "fake_image_url",
                "tagLine"=> "fake_tagline"
                ]
            ]

        );

        $findBeerForFoodMock->__invoke($food);

    }
}