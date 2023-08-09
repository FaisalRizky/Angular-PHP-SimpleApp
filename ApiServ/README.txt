API Server Laravel
Pre-requisite
	1.PHP >= 8.1 (make sure sqlite extension enabled on php.ini file)
	2.Composer

Step
1. Go to Root projects
2. Run composer install on terminal/powershell/cmd
3. copy .env.examples to.env make sure DB_CONNECTION=sqlite
4. run php artisan migrate
5. Run php artisan serve