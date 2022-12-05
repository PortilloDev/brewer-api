<?php

declare(strict_types=1);

namespace App\Tests\Functional\Src\Beer\Infrastructure;


use App\Beer\Infrastructure\HttpServiceInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\Functional\Src\Shared\Infrastructure\PunkApiClientMock;

class DataBeerTest extends WebTestCase
{
    private $repository;

    public function setUp() :void
    {
        $this->repository = $this->createMock(HttpServiceInterface::class);
    }
    public function testGetBeerFromPunkApiClient()
    {
        

        $this->repository->expects(self::once())
        ->method('getData')
        ->willReturn(
            PunkApiClientMock::responseBeer()

        );

        $this->repository->getData('GET', 'api/v2/beers',[]);


    }

    public function testGetEmptyResponseFromPunkApiClient()
    {

        $this->repository->expects(self::once())
        ->method('getData')
        ->willReturn(
            PunkApiClientMock::responseEmpty()

        );

        $this->repository->getData('GET', 'api/v2/beers',[]);
    }
}