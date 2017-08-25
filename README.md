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


#### Front-end Plugins:

- [vue2-google-maps](https://www.npmjs.com/package/vue2-google-maps)
- [CKEditor](https://ckeditor.com/builder)

#### Back-end package:

- [laravel/passport](https://laravel.com/docs/5.4/passport)  
