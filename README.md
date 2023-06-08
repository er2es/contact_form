symfony 6.3 (current last stable version) + bs5 simple contact form with webpack encore<br /><br />

php: 8.1 <br /><br />

install: <br />
composer install <br />
npm install <br />
npm run build <br />
php bin/console doctrine:migrations:migrate (dont forget to add database variables to .env file) <br />
php bin/console doctrine:fixtures:load (optional: some fixture data)
symfony server:start (symfony.exe included)