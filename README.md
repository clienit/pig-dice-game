
## Installation
 1. run: composer install
 2. Create your database and configure database connection inside the .env file
 3. run: php artisan migrate
 4. run: php artisan key:generate
 5. run: php artisan serve


## Endpoints
 1. Accepts an integer, converts it 
  - POST /convert
 2. Lists all the recently converted
  - GET /conversions
 3. Lists the top 10 converted
  - GET /top-conversions
  
 
## Testing
 - run: php artisan test
