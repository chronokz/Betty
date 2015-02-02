Betty (based on Laravel 4)
==========================

### Instalation
1) [Download](https://github.com/chronokz/Betty/archive/master.zip) on server and extract from the archive
<br>
2) Use dump or migrations with seeds for insert date to database
<br>
3) Configure database \app\config\[env]\database.php 

### Default access into admin
<pre>
<a href="http://betty/admin">http://your_doman.com/admin</a>
Login: <b>admin</b>
Password: <b>Betty</b>
</pre>


### Server Requirements

- PHP 5.4 or higher
- MySQL 5.0 or higher


### Modules structure
  
Naming modules must use a capital letter on the first letter. For example: Blog, News, Shop, etc.

  ```
  app/
      Modules
      |-- Blog
          |-- Assets/
          |-- Config/
          |-- Console/
          |-- Database/
              |-- Migrations/
              |-- Models/
              |-- Repositories/
              |-- Seeders/
          |-- Http
              |-- Controllers
              |-- Filters
              |-- Requests
              |-- routes.php
          |-- Providers/
              |-- BlogServiceProvider.php
          |-- Resources/
              |-- lang/
              |-- views/
          |-- Tests/
          |-- module.json
          |-- start.php
  ```

### Console commands:

Create new module.

`php artisan module:make blog`

Show all modules in command line.

`php artisan module:list`
  
Create new command for the specified module.
  
`php artisan module:command CustomCommand blog`

`php artisan module:command CustomCommand blog --command=custom:command`

`php artisan module:command CustomCommand blog --namespace=Modules\Blog\Commands`
  
Create new migration for the specified module.

`php artisan module:migration create_users_table blog`

`php artisan module:migration create_users_table --fields="username:string, password:string" blog`

`php artisan module:migration add_email_to_users_table --fields="email:string:unique" blog`

`php artisan module:migration remove_email_from_users_table --fields="email:string:unique" blog`

`php artisan module:migration drop_users_table blog`

Rollback, Reset and Refresh The Modules Migrations.

`php artisan module:migrate-rollback`

`php artisan module:migrate-reset`

`php artisan module:migrate-refresh`

Rollback, Reset and Refresh The Migrations for the specified module.

`php artisan module:migrate-rollback blog`

`php artisan module:migrate-reset blog`

`php artisan module:migrate-refresh blog`
  
Create new seed for the specified module.

`php artisan module:seed-make users blog`
  
Migrate from the specified module.

`php artisan module:migrate blog`
  
Migrate from all modules.

`php artisan module:migrate`
  
Seed from the specified module.

`php artisan module:seed blog`
  
Seed from all modules.
 
`php artisan module:seed`

Create new controller for the specified module.

`php artisan module:controller SiteController blog`

Publish assets from the specified module to public directory.

`php artisan module:publish blog`

Publish assets from all modules to public directory.

`php artisan module:publish`

Create new model for the specified module.

`php artisan module:model User blog`

`php artisan module:model User blog --fillable="username,email,password"`

Create new service provider for the specified module.

`php artisan module:provider MyServiceProvider blog`

Publish migration for the specified module or for all modules.
    This helpful when you want to rollback the migrations. You can also run `php artisan migrate` instead of `php artisan module:migrate` command for migrate the migrations.

For the specified module.
`php artisan module:publish-migration blog`

For all modules.
`php artisan module:publish-migration`

Enable the specified module.

`php artisan module:enable blog`

Disable the specified module.

`php artisan module:disable blog`

Generate new filter class.

`php artisan module:filter-make AuthFilter`

Update dependencies for the specified module.

`php artisan module:update ModuleName`

Update dependencies for all modules.

`php artisan module:update`