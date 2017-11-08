## Setup project: 
````
$ composer install  
$ npm install  
$ touch .env  
// and modify .env file, using sqlite as well 
$ touch database/database.sqlite  
$ php artisan events:install
```` 
  
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

Check code before push code to github~!(https://travis-ci.org)
````
vendor/bin/phpunit
vendor/bin/phpcs app --standard=PSR2
````

## Resources  

#### Front-end Plugins:touc
- [vue2-google-maps](https://www.npmjs.com/package/vue2-google-maps)
- [CKEditor](https://ckeditor.com/builder)
- [Croppie](https://github.com/foliotek/croppie)
- [vue-croppie](https://github.com/jofftiquez/vue-croppie)
- [moment](https://momentjs.com/)

#### Back-end package:
- [laravel/passport](https://laravel.com/docs/5.4/passport)


## Others     
  
  https://laravel.com/docs/5.5/passport#consuming-your-api-with-javascript