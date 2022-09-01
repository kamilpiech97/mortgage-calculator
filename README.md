## Mortgage calculator

### Installation

Clone the repository:

```
git clone https://github.com/MortgageCalculatorTeam/mortgage-calculator.git
```

Then just follow the steps below:

* initialize `.env` file and customize if needed:

```
cp .env.example .env
```

* build and run containers:

```
make build
make run
```

* go to the PHP shell and there install composer packages, generate app key and migrate and seed database:

```
make php
    composer install
    php artisan key:generate
    php artisan migrate --seed
    exit
```

* go to the Node shell and there install npm packages and build assets:

```
make node
    npm install
    npm run build
    exit
```

### Running tests

You can run PHPUnit test cases

```
make test
```

### Code style check

You can run PHP-CS-Fixer:

```
make fix
```

### xDebug

To use xDebug you need to set `DOCKER_INSTALL_XDEBUG` flag to `true` in your local `.env` file. Then you need to rebuild
PHP container: `docker-compose up --build -d php`. You can also set
up [xDebug parameters](https://xdebug.org/docs/all_settings) in `docker/dev/php/php.ini` file.

### Available containers

| service       | container name   | default external port |
|---------------|------------------|-----------------------|
| web           | mortgage-web     | 1741                  |
| php           | mortgage-php     |                       |
| database      | mortgage-db-dev  | 1742                  |
| database-test | mortgage-db-test | 1743                  |
| node          | mortgage-node    | 1744                  |
