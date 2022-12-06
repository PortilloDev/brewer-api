# Recomendador de Cervezas 🍺 

<p align="center">
  <img src="https://raw.githubusercontent.com/PortilloDev/brewer-api/master/public/img/brewer.webp" alt="brewer image" width="50%" height="50%"/>
</p>

## Descripción

Servicio API que ofrece algunos servicios como:
 - Recomendar una serie de cervezas para un tipo de alimento indicado. 
 - Información detallada de una cerveza en concreto, indicando su id.

## Pre-requisitos

Tener instalado docker en tú equipo.
 ## Instalación

* Clonar repositorio  (https://github.com/PortilloDev/brewer-api)
   ```
    git clone https://github.com/PortilloDev/brewer-api.git
    ```
* Copiar el fichero de variables de entorno .env.example y renombrar como .env
    ``` 
    cp .env.example .env
    ```
* Entrar dentro del contenedor y ejecutar 
    ``` 
    composer install
    ```
## Ejecutar la aplicación

 Ejecutar el comando `docker compose up -d` desde la raíz del proyecto.

 El servicio se levantará en el host http://localhost:8030

 En la url: http://127.0.0.1:8030/api/doc se encuentra los servicios/url disponibles

 ## Test

 Para ejecutar los tests, usar el comando 
 ```
 php bin/phpunit
 ```


## Árbol de directorios

### App
```
\SRC
│   JsonExceptionResponseTransformerListener.php    
│   Kernel.php
│
├───Beer
│   ├───Application
│   │       FindBeer.php
│   │       FindBeerForFood.php
│   │
│   ├───Domain
│   │   ├───Dto
│   │   │       BeerDto.php
│   │   │
│   │   ├───Entity
│   │   │       Beer.php
│   │   │
│   │   ├───Exception
│   │   │       BeerNotFoundException.php
│   │   │
│   │   ├───Repository
│   │   │       BeerRepository.php
│   │   │
│   │   └───ValueObjects
│   │           BeerDescription.php
│   │           BeerFirstBrewed.php
│   │           BeerId.php
│   │           BeerImage.php
│   │           BeerName.php
│   │           BeerTagline.php
│   │
│   └───Infrastructure
│           DataBeer.php
│           HttpServiceInterface.php
│
├───Http
│   │   HealthCheckController.php
│   │
│   └───Beer
│       │   ApiController.php
│       │
│       └───Exception
└───Shared
    └───Infrastructure
        │   PunkApiClient.php
        │
        └───Exception
                ClientHttpException.php
```
### Tests
```
\TESTS
│   bootstrap.php
│
├───Apps
│       DemoContext.php
│
├───Functional
│   └───Src
│       ├───Beer
│       │   ├───Application
│       │   │       FindBeerForFoodTest.php
│       │   │       FindBeerTest.php
│       │   │
│       │   └───Infrastructure
│       │           DataBeerTest.php
│       │
│       └───Shared
│           └───Infrastructure
│                   PunkApiClientMock.php
│
└───Unit
    ├───Domain
    │   └───Dto
    │           BeerDtoTest.php
    │
    └───Http
            HealthCheckControllerTest.php
```
