Betty (based on Laravel 4)
==========================

### Instalation
1. [Download](https://github.com/chronokz/Betty/archive/master.zip) on server and extract from the archive **or** clone it.
2. Configure database \app\config\[\env]\database.php 
3. Use dump **or** migrations with seeds for insert datas to database
<pre>
<b>Dump:</b>
<i><a target="_blank" href="https://github.com/chronokz/Betty/blob/master/betty.sql">view betty.sql</a></i>
<i><a target="_blank" href="https://raw.githubusercontent.com/chronokz/Betty/master/betty.sql">download betty.sql</a></i>
</pre>
<pre>
<b>Console:</b>
<i>php artisan module:migrate</i>
<i>php artisan module:seed</i>
</pre>



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

##### Modules

Create new module.

`php artisan module:make blog`

Show all modules in command line.

`php artisan module:list`

##### Commands
  
Create new command for the specified module.
  
`php artisan module:command CustomCommand blog`

`php artisan module:command CustomCommand blog --command=custom:command`

`php artisan module:command CustomCommand blog --namespace=Modules\Blog\Commands`

##### Migrations
  
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

Migrate from the specified module.

`php artisan module:migrate blog`
  
Migrate from all modules.

`php artisan module:migrate`

##### Seeds
  
Create new seed for the specified module.

`php artisan module:seed-make users blog`
  
Seed from the specified module.

`php artisan module:seed blog`
  
Seed from all modules.
 
`php artisan module:seed`

##### Controllers

Create new controller for the specified module.

`php artisan module:controller SiteController blog`

##### Assets

Publish assets from the specified module to public directory.

`php artisan module:publish blog`

Publish assets from all modules to public directory.

`php artisan module:publish`

##### Models

Create new model for the specified module.

`php artisan module:model User blog`

`php artisan module:model User blog --fillable="username,email,password"`

##### Providers

Create new service provider for the specified module.

`php artisan module:provider MyServiceProvider blog`

##### Filters

Generate new filter class.

`php artisan module:filter-make AuthFilter`
