# Buitenzorg Outdoor Gear
_**duplicate of private repository**_

Buitenzorg Outdoor Gear is a product catalog platform for renting camping and hiking equipment. This website allows users to view a variety of available outdoor gear along with detailed product information.

## Features

- **Product Catalog**: Users can view a list of products with details like name, description, rental price, and availability.
- **Product Categories**: Products can be sorted by categories such as tents, sleeping bags, cooking equipment, etc.
- **Search**: Users can search for products by name or category.
- **Stock Management**: Admins can manage the stock of available rental products.
- **CRUD Products**: Admins can add, update, and delete products.

## Technology Stack

- **Framework**: Laravel 11
- **Database**: MySQL
- **Frontend**: Blade Templating (Laravel), Bootstrap.
- **Authentication**: Laravel Auth

## Requirements

- PHP >= 8.2
- MySQL >= 5.7
- Composer

## Installation

1. **Clone this repository** into your local directory:  
   `git clone https://github.com/username/buitenzorg-outdoor-gear.git`  
   `cd buitenzorg-outdoor-gear`

2. **Install dependencies** using Composer:  
   `composer install`

3. **Copy** the `.env.example` file to `.env` and configure the database settings:  
   `cp .env.example .env`

4. **Generate the application key**:  
   `php artisan key:generate`

5. **Migrate and Seed Database**:  
Run the following command to create tables and seed initial data:  
`php artisan migrate --seed`

6. **Run Local Server**:  
Execute the following command to start the development server:  
`php artisan serve`

Once all steps are completed, open a browser and go to [http://localhost:8000](http://localhost:8000) to view the application.
