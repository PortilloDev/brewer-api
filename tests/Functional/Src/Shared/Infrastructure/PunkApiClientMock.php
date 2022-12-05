<?php 

declare(strict_types = 1);

namespace App\Tests\Functional\Src\Shared\Infrastructure;


final class PunkApiClientMock
{
    public static function responseBeer():array
    {
        return [
            "id"            => 1,
            "name"          => "Skull Candy",
            "description"   => "The first beer that we brewed on our newly commissioned 5000 litre brewhouse in Fraserburgh 2009. A beer with the malt and body of an English bitter, but the heart and soul of vibrant citrus US hops.",
            "fistBrewed"    => "02/2010",
            "image"         => "https://images.punkapi.com/v2/keg.png",
            "tagLine"       => "Pacific Hopped Amber Bitter."
        ];
    }

    public static function responseEmpty():array
    {
        return [];      

    }
} 