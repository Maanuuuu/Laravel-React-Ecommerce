# Ecommerce with Laravel & React

This repository contains a full-stack **ecommerce application** built with **Laravel** for the backend and **React** for the frontend. The main purpose of this project is to practice and demonstrate the integration between these two powerful frameworks to create a dynamic and modern web application.

The project is heavily inspired by the comprehensive multivendor e-commerce tutorial by **The Codeholic** on YouTube, providing a solid foundation for implementing complex ecommerce functionalities.

## Technologies Used

  * **Backend:** Laravel
  * **Frontend:** React
  * **Database:** MySQL
  * **Bundler:** Vite
  * **Package Managers:** Composer (PHP) & npm (Node.js)

## Key Features

  * **Shopping Cart:** Add, update, and remove items from a shopping cart, supporting both authenticated and guest users.
  * **Product Management:** Admin panel to manage products, including adding product details and images.
  * **Product Variations:** Support for different product variations (e.g., size, color) to provide a rich user experience.
  * **Checkout & Payments:** A functional checkout process (ready for a payment gateway integration like Stripe).
  * **User Authentication:** Secure user registration and login system with Laravel Sanctum.
  * **API Development:** A robust API built with Laravel to handle all data requests from the React frontend.

## Installation

Follow these steps to get a local copy of the project up and running.

### 1\. Clone the Repository

```bash
git clone https://github.com/Maanuuuu/Laravel-React-Ecommerce.git
cd Laravel-React-Ecommerce
```

### 2\. Backend Setup (Laravel)

```bash
# Install Composer dependencies
composer install

# Copy the .env.example file and create your environment file
cp .env.example .env

# Generate the application key
php artisan key:generate

# Set up your database credentials in the .env file
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

# Run database migrations and seeders
php artisan migrate --seed

# Start the Laravel development server
php artisan serve
```

### 3\. Frontend Setup (React)

Open a new terminal window in the project's root directory.

```bash
# Install npm dependencies
npm install

# Start the React development server
npm run dev
```

### 4\. Usage

After completing the installation steps, the Laravel backend will be running on `http://127.0.0.1:8000` and the React frontend will be accessible at the URL provided by Vite (e.g., `http://localhost:5173`).

The application is now ready to use. You can register a new user, add products to the cart, and explore the different functionalities.

## License

This project is licensed under the MIT License.

## Acknowledgments

  * **The Codeholic:** For the excellent tutorial that served as the primary inspiration for this project.
  * **Laravel & React:** For providing powerful and flexible tools for web development.
