# Customer Records API

This project is a RESTful API for managing customer records. It is built with Laravel and follows best practices for API development.

## Features

- List all customers
- Create a new customer
- View a specific customer
- Update a customer's details
- Delete a customer

## Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/gabrielarlo/customer-records-backend.git
    cd customer-records-backend
    ```

2. Install dependencies:
    ```sh
    composer install
    ```

3. Copy the [.env.example](http://_vscodecontentref_/0) file to [.env](http://_vscodecontentref_/1) and configure your environment variables:
    ```sh
    cp .env.example .env
    ```

4. Generate an application key:
    ```sh
    php artisan key:generate
    ```

5. Run the database migrations:
    ```sh
    php artisan migrate
    ```

6. Seed the database with sample data (optional):
    ```sh
    php artisan db:seed
    ```

## Running the API

Start the local development server:
```sh
php artisan serve
```
or
```sh
composer run dev
```


## Usage

The API will be accessible at [http://localhost:8000/api](http://localhost:8000/api).
The API documentation can be found at [http://localhost:8000/docs](http://localhost:8000/docs).
