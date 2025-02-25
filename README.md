#####🚗 car rental system
==============================
A complete Car Renting System built using Laravel Blade. This monolithic project offers seamless car rental management for customers and admins, ensuring a smooth and efficient experience.


------------------------------------------------------
###📺 Project Overview (full reivew video)
Demo Video: https://drive.google.com/file/d/1k2Qcf8OQrYcq3wW6J89ZKQ2msnwI2Z1e/view?usp=sharing
---------------------------------------------------
📌 Features
===================
🧑‍💼 Customer
-------------
Car Rental Creation: Customers can rent a car by creating a rental request. The request includes the car name, rental duration , and additional data. After submitting the request, confirmation email will be sent to the customer.

Authentication: Secure login and registration for customers.

Access Control: Customers must be logged in to create a rental.

Rental Tracking: Customers can track their rental status from the dashboard.

Profile Management: Update personal information from the profile section.

👨‍💻 Admin
--------
Admin Authentication: Secure login for admin (No registration allowed).

Car Management: Create, edit, and delete cars available for rent.

Rental Management: Track and update customer rental statuses.
Custom Rental Creation: Admin can manually create rentals for customers.

View Rental History: Access complete customer rental histories.


###🛠️ Tech Stack
-------------
Backend: Laravel (PHP Framework)

Frontend: laravel blade & javascript

Database: MySQL

Package Management: Composer & npm

🚀 Installation Guide
Clone the Repository:
git clone https://github.com/didarulZend1981/car-rental-system.git


cd car-rental-system
Set up Environment:
--------------------
###cp .env.example .env

php artisan key:generate

php artisan storage:link

Install Dependencies:

composer install

npm install
==============
Database Configuration:

Update .env with your database credentials.

DB_DATABASE=your_database_name

DB_USERNAME=your_username

DB_PASSWORD=your_password

Build Frontend:

npm run build

Start the Application:

php artisan serve

📄 Usage
Customers must register and log in to rent a car.
Admins manage cars and track customer rentals.
Admins can update the status of a rental (e.g., Pending, Ongoing, Completed).



import car-rental.sql 

Customer

email:didarul1981@gmail.com

Admin

email:didarul1981admin@gmail.com

both pass:12345678

