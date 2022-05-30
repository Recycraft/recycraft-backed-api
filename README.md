<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<h1 align="center">
  <img align="center" src="https://github.com/Recycraft/.github/blob/main/assets/racycraft.jpg"  width="200"></img>
<br>
Recycraft
</h1>

#  Bangkit 2022 Product Based Capstone

### Team ID : C22-PS285

### Members : 
* (M2007F0776) - [Wahyu Adi Nugroho](https://github.com/wahyu-adi-n) - Universitas Dian Nuswantoro
* (M2007F0777) - [Raphael Adhimas Aryandanu Santoso](https://github.com/raphaeldanu) - Universitas Dian Nuswantoro
* (A2007F0724) - [Alfonda Steven Wahyudi](https://github.com/alfondasteven) - Universitas Dian Nuswantoro
* (A2009F0915) - [Firstiannisa Rizki](https://github.com/ftiannisa) - Universitas Gunadarma
* (C2009F0934) - [Zekri Fitra Ramadhan](https://github.com/yusrankun) - Universitas Gunadarma
* (C7009F0926) - [Muhammad Rafi Ramadhan](https://github.com/rafi016) - Universitas Gunadarma

# Recyraft-Back End
This project is our final project for Google Bangkit Academy 2022.

## How to Set Up
### Local
1. Make sure you have all the prerequisites. 
2. Clone this repository
3. Copy the .env.example file in the same folder and rename it to .env 
4. Set your database credentials in the .env file.  
  Before you set this up, make sure you have created database with the same name in your MySQL Engine.  
  Set all of this with your configuration.  
  `DB_DATABASE=recycraft_backend_api    
   DB_USERNAME=root    
   DB_PASSWORD=`

5. Install the needed dependencies  
  Run this in your cmd inside the repository folder  
  `composer install`
6. Generate new key for your application  
  Run this command  
  `php artisan key:generate`
7. Run Migration and Seeder  
  `php artisan migrate:fresh --seed`
8. Run your virtual environment  
  `php artisan serve`  
  After this you can access the application from http:/localhost:8000 and if you already finish, don't forget to close the virtual environment using ctrl+c or command+c.

## License
Recycraft uses several frameworks, including:
1. Laravel framework for the back-end which is an open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
2. AdminLTE for the admin front-end which is is an open source project by [AdminLTE.io](https://adminlte.io) that is licensed under [MIT](https://opensource.org/licenses/MIT).

<!-- Color : #04DE7D -->
