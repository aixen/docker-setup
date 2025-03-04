# Laravel Microservices with Docker

This guide provides instructions on how to set up and run the Laravel microservices project using Docker.

## Prerequisites
Ensure you have the following installed:
- [Docker Desktop](https://www.docker.com/products/docker-desktop)
- [Git](https://git-scm.com/downloads)
- [Composer](https://getcomposer.org/)
- [MySQL Workbench](https://www.mysql.com/products/workbench/)

## Installation and Setup

### 1. Clone the Repository
```sh
git clone https://your-repository-url.git
cd laravel-microservices
```

### 2. Add Host Entries
Edit your **hosts** file to map domains to localhost:
```sh
sudo nano /etc/hosts   # For macOS/Linux
notepad C:\Windows\System32\drivers\etc\hosts   # For Windows
```
Add the following line:
```
127.0.0.1 auth.local
```
Save and close the file.

### 3. Build and Run Containers
Run the following command to start the services:
```sh
docker-compose up -d --build
```
This will build and start the following services:
- **nginx_gateway** (Nginx Reverse Proxy)
- **app-authentication** (Laravel Authentication Microservice)
- **php_workspace** (PHP Environment)
- **mysql_db** (MySQL Database)
- **redis_cache** (Redis for caching)
- **redis_ui** (Redis Insight UI for monitoring)

### 4. Install Laravel in Authentication Service
If Laravel is not installed inside the `app-authentication` container, run:
```sh
docker exec -it app-authentication bash
cd /var/www/authentication
composer create-project --prefer-dist laravel/laravel .
exit
```

### 5. Set Up Environment Variables
Copy the Laravel environment file:
```sh
docker exec -it app-authentication cp /var/www/authentication/.env.example /var/www/authentication/.env
```
Then update the database connection settings in `.env`:
```
DB_CONNECTION=mysql
DB_HOST=mysql_db
DB_PORT=3306
DB_DATABASE=auth_db
DB_USERNAME=root
DB_PASSWORD=root
```
Run the migrations:
```sh
docker exec -it app-authentication php artisan migrate
```

### 6. Access the Services
- Laravel Authentication Microservice: [http://auth.local](http://auth.local)
- MySQL Database: Use `mysql_db`, username `root`, password `root` (via MySQL Workbench)
- Redis Insight UI: [http://localhost:8001](http://localhost:8001)

### 7. Stop Containers
To stop all running containers:
```sh
docker-compose down
```

### 8. Additional Commands
- View running containers:
  ```sh
  docker ps
  ```
- Restart a container:
  ```sh
  docker-compose restart app-authentication
  ```
- Enter a container:
  ```sh
  docker exec -it app-authentication bash
  ```
