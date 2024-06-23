# Simple Task Management using Laravel and VueJS

### Prerequisites
Ensure you have the following installed:

- Docker
- Docker Compose

### Clone the repository

```sh
git clone https://github.com/tuxxbigwater/task-management-laravel-vue.git
cd task-management-laravel-vue
```

### Environment Configuration
1. Copy the example environment file and update your environment variables:
```sh
cp .env.example .env
```

2. Update your .env file to match your database configuration.

```sh
  DB_CONNECTION=mysql
  DB_HOST=mysql
  DB_PORT=3306
  DB_DATABASE=laravel
  DB_USERNAME=sail
  DB_PASSWORD=password # Of course, in production, you shouldn't put passwords in the repository.
```

3. Install Composer dependencies:

```sh
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

### Start the Development Server
```sh
  ./vendor/bin/sail up -d
```

Your application should now be running on http://localhost.

### Install Node Dependencies
```sh
  ./vendor/bin/sail npm install --include=dev
```

### Generate the Application Key:
```sh
  ./vendor/bin/sail artisan key:generate
```

### Run Migrations and Seeders
```sh
  ./vendor/bin/sail artisan db:refresh
```  

## Running the Application
### Running Vite
In a separate terminal, run the Vite development server:
```sh
  ./vendor/bin/sail npm run dev
```

### Front-end Deployment
Build the assets
```sh
  ./vendor/bin/sail npm run build
```

Now you can turn off your Vite development server, and you can still access your Vue application.

