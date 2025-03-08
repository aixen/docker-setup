# Laravel Microservices with Docker

This guide provides instructions on how to set up and run the Laravel microservices project using Docker.

## Prerequisites
Ensure you have the following installed:
- [Docker Desktop](https://www.docker.com/products/docker-desktop)
- [Git](https://git-scm.com/downloads)
- [Composer](https://getcomposer.org/)
- [Postman](https://www.postman.com/)
- [MySQL Workbench](https://www.mysql.com/products/workbench/)
- [Another Redis Desktop Manager](https://goanother.com/)

## Requirements
- PHP 8.2 or Up
  - Laravel 12
  - Redis
- MySQL 8.4
- VueJs 3
  - Pinia 3.0
  - Vue-Router 4.5
  - Bootstrap 5
- Node v22.14.0
- NPM 10.9.2

## Installation and Setup

### 1. Clone the Repository
```sh
git clone https://github.com/aixen/docker-setup.git

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
127.0.0.1 gateway.local
127.0.0.1 auth.local
```
Save and close the file.

### 3. Build and Run Containers
Run the following command to start the services:
```sh
docker-compose up -d --build
```
This will build and start the following services this is all dynamic containers name:
- **nginx** (Nginx Reverse Proxy)
- **php_workspace** (PHP Environment)
- **mysql** (MySQL Database)
- **redis** (Redis for caching)
- **app-gateway** (Laravel Gateway Microservice)
- **app-authentication** (Laravel Authentication Microservice)

### 4. Access the Services
- Laravel Gateway Microservice: [http://gateway.local](http://gateway.local)
- Laravel Authentication Microservice: [http://auth.local](http://auth.local)
- MySQL Database: Use `mysql_db`, username `root`, password `root` (via MySQL Workbench)

### 5. Stop Containers
To stop all running containers:
```sh
docker-compose down
```

### 6. Additional Commands
- View running containers:
  ```sh
  docker ps -a
  ```
- Rebuild container:
  ```sh
  docker-compose up -d --build
  ```
- Enter a container workspace per service:
  ```sh
  docker exec -it gateway-workspace bash
  docker exec -it authentication-workspace bash
  ```
