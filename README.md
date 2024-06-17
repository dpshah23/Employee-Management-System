# Employee Management System

## Overview

The Employee Management System is a web-based application built using PHP and MySQL. It facilitates the management of employee records, attendance tracking, and salary details. The system supports two types of users: Admin and Staff.

## Table of Contents

- [Features](#features)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Database Structure](#database-structure)
- [Usage](#usage)

## Features

### Admin Functionalities:
- Add new employees
- Set employee salaries
- Mark attendance

### Staff Functionalities:
- Record attendance
- View salary details

## Prerequisites

Before you begin, ensure you have met the following requirements:

- A web server with PHP support (e.g., Apache)
- MySQL or MariaDB server
- PHP and MySQL installed on your system

## Installation

1. Clone the repository:
   ```sh
   git clone https://github.com/dpshah23/Employee-Management-System.git
   cd Employee-Management-System
   ```

2. Move the project files to your web server's root directory. For example, if you're using XAMPP, move the files to `C:/xampp/htdocs/employee-management-system`.

3. Configure the database connection settings in `dbconfig.php`:
   ```php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'your_db_username');
   define('DB_PASSWORD', 'your_db_password');
   define('DB_NAME', 'employee_management_system');
   ```

4. Create the database and tables using the provided SQL structure (see [Database Structure](#database-structure)).

5. Launch the application using your web server.

## Database Structure

The system comprises three main tables:

### Database Name: `employee_management_system`

#### `users` Table

| Column Name | Data Type | Size |
|-------------|-----------|------|
| empid       | varchar   | 50   |
| email       | varchar   | 30   |
| password    | varchar   | 40   |
| fname       | varchar   | 15   |
| lname       | varchar   | 15   |
| gender      | varchar   | 7    |
| address     | varchar   | 150  |
| mobile      | int       | 12   |
| startdate   | varchar   | 50   |
| enddate     | varchar   | 50   |
| isactive    | varchar   | 1    |
| role        | varchar   | 15   |

#### `attendance` Table

| Column Name | Data Type | Size |
|-------------|-----------|------|
| empid       | varchar   | 50   |
| cdate       | varchar   | 25   |
| ctime       | varchar   | 35   |
| cstatus     | varchar   | 15   |

#### `salary` Table

| Column Name       | Data Type | Size |
|-------------------|-----------|------|
| empid             | varchar   | 30   |
| basicpay          | varchar   | 10   |
| housingallowance  | varchar   | 10   |
| transportallowance| varchar   | 10   |
| medicalallowance  | varchar   | 10   |
| netsalary         | varchar   | 10   |

## Usage

- **Admin**: Log in with admin credentials to access the admin functionalities.
- **Staff**: Log in with staff credentials to access staff functionalities.

