
# Task Assessment 

Task Assessment where an admin can create a task for different departmant. Each Department can update the progress level of the task. [ A CRUD task]



## Project Setup

Install my-project with npm

```bash
  git clone git@github.com:Epheoluwa/moore.git
  cd moore
  composer install
  cp .env.example .env 
  php artisan key:generate
  php artisan cache:clear && php artisan config:clear 
```
    
## Database Setup

Different CRUD requests will be performed using local storage so we need to setup our database connection
```
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=database_name
  DB_USERNAME=root
  DB_PASSWORD=
```

Next up, if you are using the ```MYSQL DATABASE``` or any other database, there is need to create the database which will be grabbed from the ```DB_DATABASE``` environment variable. ```MYSQL``` database query written below
```
  MySQL;
  create database database_name;
  exit;
```

Finally, run the code below to make migrations.
```
  php artisan migrate
```
## Start

To Start this project run

```bash
  php artisan serve
```
## Credentials

To Login to the admin Dashbord

```bash
  Email: admin@admin.com
  Password: 12345678
```

## Usage
•	Only the admin have access to create and delete a task <br>
•	Each Department can only view and edit their respective task <br>

## Authors

- [@Solomon Sunmola](https://github.com/Epheoluwa)

