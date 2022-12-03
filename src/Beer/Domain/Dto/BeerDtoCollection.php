<?php
declare(strict_types=1);

namespace App\Beer\Domain\Dto;


final class BeerDtoCollection
{   

    public function __invoke(array $beers)
    {
        $data = [];

        foreach($beers as $beer) {
            array_push($data, [
                'id'            => $beer['id'],
                'name'          => $beer['name'],
                'tagline'       => $beer['tagline'],
                'first_brewed'  => $beer['first_brewed'],
                'description'   => $beer['description'],
                'image_url'     => $beer['image_url'],
                
            ]);
        }

        return $data;
    }
}   