# Laravel Project README

## Prerequisites

- Laravel 10
- PHP 8.1 or above
- Composer installed

## Setup Instructions

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/Ranjit2/mgmt.git

Install Dependencies:


cd your-laravel-project

composer install

Configure Environment:

Duplicate the .env.example file and rename it to .env.
Configure your database connection and other necessary settings in the .env file.

Generate Application Key:

php artisan key:generate

Import Provide SQL file into your database

User login credentials

email: admin@gmail.com

password: admin123

or

Run Migrations and Seed Database:

php artisan migrate --seed

Start the Development Server:

php artisan serve
Your Laravel application should now be running at http://localhost:8000.



Project Structure
app: Contains application's core logic, including controllers, models, and other PHP files.

config: Configuration files for the application.

database: Migration files and seeders.

public: The public directory contains the front controller (index.php) and assets like images, styles, and scripts.

resources: Views, language files, and other assets.

routes: Contains the web.php file where you define your web routes.

tests: Your PHPUnit tests.

vendor: Composer dependencies.

Key Functionalities

Task Management:

Create, edit, update, and delete tasks.

Assign tasks to users.

User Management:

Basic user authentication.