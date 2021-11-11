# ES-CPNV-TeamBuilder

## Autologin

The id of the autologed member is define in the root .env file.

```php
const USER_ID = 1;
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
