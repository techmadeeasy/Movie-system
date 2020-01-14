Instructions to run this Projects

1. Clone the repository
2. Run composer install(make sure you have composer installed)
3. Run php artisan key:gen
4. run "cp .env.example .env" to create a new  ".env" from the .env.example 
4. Edit the .env file and add your database credentials 
5. Run php artisan migrate:refresh --seed 
5. Run php artisan serve to run development server 
6. Enjoy 


Dependency 

- Laravel  5.8
- PHP 7.2 +
- Composer 
