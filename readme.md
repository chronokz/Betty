Betty (based on Laravel 4)
==========================

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

  ```
  php artisan module:make blog
  ```

Show all modules in command line.

```
php artisan module:list
```
  
Create new command for the specified module.
  
  ```
  php artisan module:command CustomCommand blog

  php artisan module:command CustomCommand blog --command=custom:command

  php artisan module:command CustomCommand blog --namespace=Modules\Blog\Commands
  ```
  
Create new migration for the specified module.

  ```
  php artisan module:migration blog create_users_table

  php artisan module:migration blog create_users_table --fields="username:string, password:string"

  php artisan module:migration blog add_email_to_users_table --fields="email:string:unique"

  php artisan module:migration blog remove_email_from_users_table --fields="email:string:unique"

  php artisan module:migration blog drop_users_table
  ```

Rollback, Reset and Refresh The Modules Migrations.
```
  php artisan module:migrate-rollback

  php artisan module:migrate-reset

  php artisan module:migrate-refresh
```

Rollback, Reset and Refresh The Migrations for the specified module.
```
  php artisan module:migrate-rollback blog

  php artisan module:migrate-reset blog

  php artisan module:migrate-refresh blog
```
  
Create new seed for the specified module.

  ```
  php artisan module:seed-make users blog
  ```
  
Migrate from the specified module.

  ```
  php artisan module:migrate blog
  ```
  
Migrate from all modules.

  ```
  php artisan module:migrate
  ```
  
Seed from the specified module.

  ```
  php artisan module:seed blog
  ```
  
Seed from all modules.
 
  ```
  php artisan module:seed
  ```

Create new controller for the specified module.

  ```
  php artisan module:controller SiteController blog
  ```

Publish assets from the specified module to public directory.

  ```
  php artisan module:publish blog
  ```

Publish assets from all modules to public directory.

  ```
  php artisan module:publish
  ```

Create new model for the specified module.

  ```
  php artisan module:model User blog

  php artisan module:model User blog --fillable="username,email,password"
  ```

Create new service provider for the specified module.

  ```
  php artisan module:provider MyServiceProvider blog
  ```

Publish migration for the specified module or for all modules.
    This helpful when you want to rollback the migrations. You can also run `php artisan migrate` instead of `php artisan module:migrate` command for migrate the migrations.

For the specified module.
```
php artisan module:publish-migration blog
```

For all modules.
```
php artisan module:publish-migration
```

Enable the specified module.

```
php artisan module:enable blog
```

Disable the specified module.

```
php artisan module:disable blog
```

Generate new filter class.
```
php artisan module:filter-make AuthFilter
```

Update dependencies for the specified module.
```
php artisan module:update ModuleName
```

Update dependencies for all modules.
```
php artisan module:update
```

### Facades API

Get asset url from specified module.

  ```php
  Module::asset('blog', 'image/news.png');
  ```

Generate new stylesheet tag.

  ```php
  Module::style('blog', 'image/all.css');
  ```

Generate new stylesheet tag.

  ```php
  Module::script('blog', 'js/all.js');
  ```

Get all modules.

  ```php
  Module::all();
  ```

Get all enabled module.
```php
    Module::enabled();
```

Get all disabled module.
```php
    Module::disabled();
```

Get modules path.

  ```php
  Module::getPath();
  ```

Get assets modules path.

  ```php
  Module::getAssetsPath();
  ```

Get module path for the specified module.

  ```php
  Module::getModulePath('blog');
  ```

Enable a specified module.
```php
    Module::enable('blog')
```

Disable a specified module.
```php
    Module::disable('blog')
```

Get module json property as array from a specified module.
```php
    Module::getProperties('blog')
```

### Custom Namespaces

  When you create a new module it also registers new custom namespace for `Lang`, `View` and `Config`. For example, if you create a new module named `blog`, it will also register new namespace/hint `blog` for that module. Then, you can use that namespace for calling `Lang`, `View` or `Config`.
  Following are some examples of its usage:

  Calling Lang:
  ```php
  Lang::get('blog::group.name')
  ```

  Calling View:
  ```php
  View::make('blog::index')

  View::make('blog::partials.sidebar')
  ```

  Calling Config:
  ```php
  Config::get('blog::group.name')
  ```
