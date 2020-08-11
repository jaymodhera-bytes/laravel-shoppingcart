# Building Test Laravel Project
This is a test laravel project demo application showing how to build simple operations of add to cart using Laravel.

## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
What things you need to install the software.

* Git.
* PHP.
* Composer.
* Laravel CLI.
* A webserver like Nginx or Apache.

### Install
Clone the git repository on your computer

```$ git clone https://github.com/jaymodhera-bytes/laravel-shoppingcart.git```


You can also download the entire repository as a zip file and unpack in on your computer if you do not have git

After cloning the application, you need to install it's dependencies.

```
$ cd laravel-shoppingcart
$ composer update
```


### Setup
- When you are done with installation, copy the `.env.example` file to `.env`

  ```$ cp env.example .env```


- Generate the application key

  ```$ php artisan key:generate```


- Add your database credentials to the necessary `env` fields

- Migrate the application

  ```$ php artisan migrate```

- Seed Database

  ```$  php artisan db:seed --class=ProductsSeeder```


### Run the application

  ```$ php artisan serve```

### Process Job Queue
If you are running the application in local system then run ```$ php artisan queue:work``` in separate command tab. On live server, we have to correctly install and configure Supervisor to process the job queue.


### Country blocking for placing order
If you want to block users from specific country(s) to place an order. You have to provide two-letter country abbreviation for the countries. You can check : https://www.iban.com/country-codes for getting the country code. Open ```$  config/app.php``` file and search for ```blocked_countries``` key. Here, you can provide the country code that you want to block.
