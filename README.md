# ES-CPNV-TeamBuilder

## Installation

Use the package manager [composer](https://getcomposer.org/download/) and [npm](https://www.npmjs.com/).

```bash
git clone https://github.com/Penfu/ES-CPNV-TeamBuilder.git
cd src
composer install
npm install
npm run build
```


## Autologin

The autologed member id is defined in the .env config file.

```php
const USER_ID = 1;
```

## Run locally

```bash
php -S localhost:9000 -t src/public
```

## Unit tests

Run the unit tests from `src\` with the command:

```bash
vendor/bin/phpunit tests/models/
```

To run an individual test, specifiy the test file at the end of the path:

```bash
vendor/bin/phpunit tests/models/TestFile.php
```

## Lib

- [Tailwindcss](https://tailwindcss.com/)

