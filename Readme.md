# Recomendador de Cervezas 馃嵑 

<p align="center">
  <img src="https://raw.githubusercontent.com/PortilloDev/brewer-api/master/public/img/brewer.webp" alt="brewer image" width="50%" height="50%"/>
</p>

## Descripci贸n

Servicio API que ofrece algunos servicios como:
 - Recomendar una serie de cervezas para un tipo de alimento indicado. 
 - Informaci贸n detallada de una cerveza en concreto, indicando su id.

## Pre-requisitos

Tener instalado docker en t煤 equipo.
 ## Instalaci贸n

* Clonar repositorio  (https://github.com/PortilloDev/brewer-api)
   ```
    git clone https://github.com/PortilloDev/brewer-api.git
    ```
* Copiar el fichero de variables de entorno .env.example y renombrar como .env
    ``` 
    cp .env.example .env
    ```
* Dentro de la ra铆z del proyecto, ejecutar
    ``` 
    docker compose up -d
    ```
* Entrar dentro del contenedor y ejecutar 
    ``` 
    composer install
    ```
## Estado de la aplicaci贸n

 El servicio se levantar谩 en el host http://localhost:8030

 En la url: http://127.0.0.1:8030/api/doc se encuentra la informaci贸n de los servicios/url disponibles

 ## Test

 Para ejecutar los tests, usar el comando 
 ```
 php bin/phpunit
 ```


## 脕rbol de directorios

### App
```
\SRC
鈹?   JsonExceptionResponseTransformerListener.php    
鈹?   Kernel.php
鈹?
鈹溾攢鈹?鈹?Beer
鈹?   鈹溾攢鈹?鈹?Application
鈹?   鈹?       FindBeer.php
鈹?   鈹?       FindBeerForFood.php
鈹?   鈹?
鈹?   鈹溾攢鈹?鈹?Domain
鈹?   鈹?   鈹溾攢鈹?鈹?Dto
鈹?   鈹?   鈹?       BeerDto.php
鈹?   鈹?   鈹?
鈹?   鈹?   鈹溾攢鈹?鈹?Entity
鈹?   鈹?   鈹?       Beer.php
鈹?   鈹?   鈹?
鈹?   鈹?   鈹溾攢鈹?鈹?Exception
鈹?   鈹?   鈹?       BeerNotFoundException.php
鈹?   鈹?   鈹?
鈹?   鈹?   鈹溾攢鈹?鈹?Repository
鈹?   鈹?   鈹?       BeerRepository.php
鈹?   鈹?   鈹?
鈹?   鈹?   鈹斺攢鈹?鈹?ValueObjects
鈹?   鈹?           BeerDescription.php
鈹?   鈹?           BeerFirstBrewed.php
鈹?   鈹?           BeerId.php
鈹?   鈹?           BeerImage.php
鈹?   鈹?           BeerName.php
鈹?   鈹?           BeerTagline.php
鈹?   鈹?
鈹?   鈹斺攢鈹?鈹?Infrastructure
鈹?           DataBeer.php
鈹?           HttpServiceInterface.php
鈹?
鈹溾攢鈹?鈹?Http
鈹?   鈹?   HealthCheckController.php
鈹?   鈹?
鈹?   鈹斺攢鈹?鈹?Beer
鈹?       鈹?   ApiController.php
鈹?       鈹?
鈹?       鈹斺攢鈹?鈹?Exception
鈹斺攢鈹?鈹?Shared
    鈹斺攢鈹?鈹?Infrastructure
        鈹?   PunkApiClient.php
        鈹?
        鈹斺攢鈹?鈹?Exception
                ClientHttpException.php
```
### Tests
```
\TESTS
鈹?   bootstrap.php
鈹?
鈹溾攢鈹?鈹?Apps
鈹?       DemoContext.php
鈹?
鈹溾攢鈹?鈹?Functional
鈹?   鈹斺攢鈹?鈹?Src
鈹?       鈹溾攢鈹?鈹?Beer
鈹?       鈹?   鈹溾攢鈹?鈹?Application
鈹?       鈹?   鈹?       FindBeerForFoodTest.php
鈹?       鈹?   鈹?       FindBeerTest.php
鈹?       鈹?   鈹?
鈹?       鈹?   鈹斺攢鈹?鈹?Infrastructure
鈹?       鈹?           DataBeerTest.php
鈹?       鈹?
鈹?       鈹斺攢鈹?鈹?Shared
鈹?           鈹斺攢鈹?鈹?Infrastructure
鈹?                   PunkApiClientMock.php
鈹?
鈹斺攢鈹?鈹?Unit
    鈹溾攢鈹?鈹?Domain
    鈹?   鈹斺攢鈹?鈹?Dto
    鈹?           BeerDtoTest.php
    鈹?
    鈹斺攢鈹?鈹?Http
            HealthCheckControllerTest.php
```
