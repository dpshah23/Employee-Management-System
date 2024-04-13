# Employee Management System

## Overview
The Employee Management System is a web-based application built using PHP and MySQL database. It facilitates the management of employee records, attendance tracking, and salary details. The system supports two types of users: Admin and Staff.

### Features
- Admin functionalities:
  - Add new employees
  - Set employee salaries
  - Mark attendance
- Staff functionalities:
  - Record attendance
  - View salary details

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/dpshah23/Employee-Management-System.git
   ```
2. Database Structure Given at <a href="#database-structure"></a>
3. Configure database connection settings in `dbconfig.php`.
4. Launch the application using a web server.

## Database Structure
The system comprises three main tables:

<h4>Database Name : employee management system</h4>

### `users` Table

| Column Name   | Data Type | Size |
|---------------|-----------|------|
| empid         | varchar   | 50   |
| email         | varchar   | 30   |
| password      | varchar   | 40   |
| fname         | varchar   | 15   |
| lname         | varchar   | 15   |
| gender        | varchar   | 7    |
| address       | varchar   | 150  |
| mobile        | int       | 12   |
| startdate     | varchar   | 50   |
| enddate       | varchar   | 50   |
| isactive      | varchar   | 1    |
| role          | varchar   | 15   |

### `attendance` Table

| Column Name   | Data Type | Size |
|---------------|-----------|------|
| empid         | varchar   | 50   |
| cdate         | varchar   | 25   |
| ctime         | varchar   | 35   |
| cstatus       | varchar   | 15   |

### `salary` Table

| Column Name          | Data Type | Size |
|----------------------|-----------|------|
| empid                | varchar   | 30   |
| basicpay             | varchar   | 10   |
| housingallowance     | varchar   | 10   |
| transportallowance   | varchar   | 10   |
| medicalallowance     | varchar   | 10   |
| netsalary            | varchar   | 10   |

## Usage

- **Admin**: Log in with admin credentials to access the admin functionalities.
- **Staff**: Log in with staff credentials to access staff functionalities.

