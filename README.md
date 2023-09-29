# Football-Simulation

Project Name is a web application built using Laravel and Vue.js.

##  Project Requirements

Before you begin, ensure you have met the following requirements:

- Node.js installed
- Composer installed
- PHP >= 7.4
- Laravel CLI installed
- Database server (e.g., MySQL) installed

## Used Packages

This project utilizes the following packages:

- **axios**: Used for making HTTP requests.
- **laravel-mix**: Simplifies Webpack compilation for Laravel projects.
- **lodash**: Used for JavaScript utility functions.
- **postcss**: Employed for CSS automation and transformation.
- **vue**: Utilized for developing JavaScript applications.
- **vue-loader**: Used to load Vue components.
- **datatables.net**: Utilized for organizing data tables.
- **datatables.net-vue3**: Provides DataTables integration for Vue 3.


## Installation

To get the project up and running, follow these steps:

1. Clone the repository:

   ```bash
   git clone https://github.com/eyupinann/football-simulation.git
    ```

2. Navigate to the project directory:

   ```bash
   cd football-simulation
    ```

3. Copy the .env.example file to .env and configure your environment variables:

   ```bash
    cp .env.example .env
    ```
4. Generate an application key:

   ```bash
    php artisan key:generate
    ```
   
5. Run database migrations and seeders

   ```bash
    php artisan migrate
   php artisan db:seed
    ```
   
6. Start the Laravel development server:

   ```bash
    php artisan serve
    ```
   
7. Install JavaScript dependencies and compile assets for development

   ```bash
    npm install
    npm run dev
    ```
   
8. Run tests

   ```bash
    php artisan test
    ````
9. Generate API documentation

   ```bash
   php artisan scribe:generate
    ```

## Usage

Access the Laravel Api Doc application at `http://localhost:8000`.

Access the Vue.js application at `http://localhost:8080`.

## Contributing

Contributions are welcome! Please follow the [Contributing Guidelines](CONTRIBUTING.md).

## License

This project is open-source and available under the [MIT License](LICENSE).
