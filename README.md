## Running Your Cloned Laravel Project

### 1. Create Environment File

Make a copy of the `.env.example` file in the project directory and name it `.env`:

```sh
cp .env.example .env
```

Then generate an application key to secure your application:

```
php artisan key:generate
```

### 2. Configure the Database

Open the .env file and set the database connection details including DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD.

### 3. Run Migrations

Run the following command to apply the migrations and create the necessary database tables:

```
php artisan migrate
```

This will start the development server, and you should see a URL (e.g., http://127.0.0.1:8000) where you can access your application in your web browser.
