<?php 
namespace App\Tests\Unit\Domain\Dto;

use App\Beer\Domain\Dto\BeerDto;
use App\Beer\Domain\ValueObjects\BeerId;
use App\Beer\Domain\ValueObjects\BeerName;
use App\Beer\Domain\ValueObjects\BeerImage;
use App\Beer\Domain\ValueObjects\BeerTagline;
use App\Beer\Domain\ValueObjects\BeerDescription;
use App\Beer\Domain\ValueObjects\BeerFirstBrewed;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;



class BeerDtoTest extends WebTestCase
{
    public function testValidationofCorrectDataStructure()
    {

        $id          = new BeerId(1);
        $name        = new BeerName('fakeName');
        $firstBrewed = new BeerFirstBrewed('fake_first_brewed');
        $image       = new BeerImage('fake_image_url');
        $tagline     = new BeerTagline('fake_tagline');
        $description = new BeerDescription('fake_description');

        $newDtoBeer = new BeerDto($id, $name, $firstBrewed, $image, $tagline, $description);
        $resource = ($newDtoBeer->resource());


        $this->assertIsArray($newDtoBeer->resource());
        $this->assertEquals($id->value(), $resource['id']);
        $this->assertEquals($name->value(), $resource['name']);
        $this->assertEquals($firstBrewed->value(), $resource['firstBrewed']);
        $this->assertEquals($image->value(), $resource['image']);
        $this->assertEquals($tagline->value(), $resource['tagLine']);
        $this->assertEquals($description->value(), $resource['description']);
    }
}