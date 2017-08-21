## How to play github online testing??

touch .travis.yml    
  
````
language: php

php:
 - 7.0
 - 7.1

before_script:
  - composer install --dev --prefer-source --no-interaction
  - cp .env.travis .env
  - php artisan key:generate

script:
  - vendor/bin/phpunit
  - vendor/bin/phpcs app --standard=PSR2
````  

composer require --dev squizlabs/php_codesniffer 

Check code before push code to github~!  
````  
vendor/bin/phpunit
vendor/bin/phpcs app --standard=PSR2  
````  

 