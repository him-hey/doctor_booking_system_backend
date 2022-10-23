## Doctor appointment booking system api

<h2>Requirements</h2>
- php >= 8
- mysql >= 8.9
- composer >= 2 or lastest

<h2>Get started</h2>

<h2>Setup</h2>
<h3>Clone repository</h3>
<li>$ git clone https://github.com/him-hey/doctor_booking_system_backend.git</li>
<li>$ cd doctor_booking_system_backend</li>

<h3>Copy .env.example</h3>
<li>$ cp .env.example .env</li>

<h3>Create database</h3>
<li>$ mysql -e "CREATE DATABASE IF NOT EXISTS doctor_appointment_api DEFAULT CHARACTER SET utf8;"</li>


<h3>Install php dependencies</h3>
<li>$ composer install</li>


<h3>Create key generate</h3>
<li>$ php artisan key:generate</li>


<h3>Migrate</h3>
<li>$ php artisan migrate</li>


<h3>Run the api</h3>
<li>$ php artisan serve </li>

<h3>Access api to confirm connection</h3>
<li>http://localhost:8000/api</li>

