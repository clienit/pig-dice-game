
## Installation
 1. run: composer install
 2. Configure database connection:
  - If you are using MySQL:
   i. Create your database for MySQL
   ii. Configure database connection parameters inside the .env file
 3. run: php artisan migrate
 4. run: php artisan key:generate
 5. run: php artisan serve


## Endpoints
 1. Accepts an integer
    POST /convert
 2. Lists all 
    GET /conversions
 3. Lists the 
    GET /top-conversions
  
 
## Testing
 - run: php artisan test
