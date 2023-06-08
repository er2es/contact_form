symfony 6.3 (current last stable version) + bs5 simple contact form with webpack encore

php: 8.1

install:
composer install
npm install
npm run build
php bin/console doctrine:migrations:migrate (dont forget to add database variables to .env file)
symfony server:start (symfony.exe included)