<p align="center"><a href="https://github.com/antaridj1/interior-design-web" target="_blank"><img src="https://github.com/antaridj1/interior-design-web/blob/101a0653c9a16549fe0c112d017753e370ae06c0/public/assets/img/logo.png" width="400" alt="Interior Logo"></a></p>


## About Interior Design Management Web

**Interior Design Management Web** is a streamlined web application built with Laravel 8, designed to support interior design corporate to manage their client's projects. The application provides a user-friendly landing page for potential customers, pages for client to see the project progress, pages for employee to report their progress, and admin dashboard for owner of the company

### Key Features

- **Order System:** Order interior design and sent a notification with email and whatsapp.
- **Report Management:** Upload and see the progress report of the project
- **Admin Dashboard:** Manage the projects with a comprehensive dashboard.
- **Responsive Design:** Optimized for both desktop and mobile devices.

## Getting Started

### Requirements

- **PHP** >= 8.0
- **Composer**
- **MySQL** database
- **Web Server:** Apache, Nginx, or similar

### Installation

1. **Clone Repository**

   ```bash
    git clone https://github.com/your-username/interior-design-web.git
    cd interior-design-web
    composer install
    ```
2. **Create Environtment**
    ```bash
    cp .env.example .env
    ```
3. **Generate Key in .env**
    ```bash
    php artisan key:generate
    ```
4. **Create Database**
    Create a database named "interior"

5. **Run The Migrations**
    ```bash
    php artisan migrate --seed
    ```
6. **Run The Web**
    ```bash
    php artisan server
    ```
    Visit http://127.0.0.1:8000 to access the application.