---
extends: _layouts.post
section: content
title: Laravel Eloquent Introduction
date: 2020-07-11
description: Laravel Eloquent operations introduction
cover_image: /assets/images/wall-post.svg
featured: true
categories: [laravel]
author: Chinwal Prasad
---

Laravel eloquent is an ActiveRecord implementation to interact with database. An ActiveRecord is simply the 'M' - Model, in the MVC architecture. On Laravel documentation page Eloquent is described as Eloquent ORM (Object Relational Mapping system). To make this easy, you can think that each Model in your laravel application corresponds to a table in your database. Let's get started!

## Defining Models

Laravel as a framework provides us with many artisan commands which can be executed on the command line to assist us with building application. You can see the list of commands available by running the command ``` php artisan list```.

To make a new model you can run the command below:

``` php artisan make:model User```

When run successfully this will create a file called ```User.php``` in the ``` app``` directory.

When you open this file you can notice that this file extends the ``` Illuminate\Database\Eloquent\Model``` class, infact all the eloquent classes extend this base class.

> _app/User.php_

```php
    <?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class User extends Model
    {
        //
    }
```

### Defining table name

As you may have noticed we still haven't described the name of the table. By default Eloquent uses the ``` snake_case``` and pluralizes the name of the class and uses it as the table name. Ofcourse you can override this by overriding a property on the class.

> _app/User.php_

```php
    <?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class User extends Model
    {
        /**
         * The table associated with the model.
         *
         * @var string
         */
        protected $table = 'users';
    }
```

### Defining primary keys

Just like we defined the table name by overriding a property on the eloquent class we can also override the primary key of the our table. By default Laravel uses the ```id``` as the primary key.

> _app/User.php_

```php
    <?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class User extends Model
    {
        /**
         * The primary key associated with the table.
         *
         * @var string
         */
        protected $primaryKey = 'user_id';
    }
```

### Defining database connection

If you build large applications which connect to 2 or more database by using different connections, you may want to explicitly specify the database connection on the Eloquent model. You can do this by overriding the ```connection``` property on the model.

> _app/User.php_

```php
    <?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class User extends Model
    {
        /**
         * The connection name for the model.
         *
         * @var string
         */
        protected $connection = 'connection-name';
    }
```

## How to retrieve data from the database 💁‍♂️

- Using the ```all()``` method on the model

```php
$users = App\Users::all();
```

This returns an instance of ```Illuminate\Database\Eloquent\Collection``` of all users in the users table.

- Using the ```get()``` method on the model

```php
$users = App\Users::get();
```

The get method also returns an instance of ```Illuminate\Database\Eloquent\Collection``` of all users in the users table.

- Using the ```first()``` method on the model

```php
$users = App\Users::first();
```

This returns the instance of ```App\User``` which contains the first user in the users table.

- Using the ```find()``` method on the model

```php
$users = App\Users::find(1);
```
The ```find()``` method takes one argument which is the primary key on the table and returns an instance of the ```App\User``` class with the record with ```id = 1```

> #### Note:
>
> The methods ``` first()``` and ``` find()``` return Single Models\Aggregates instead of a collection.

## How to insert data into database 💁‍♂️

- By using the ``` save()``` method

```php
    $user = new App\User();
    $user->first_name = 'Prasad';
    $user->last_name = 'Chinwal';
    $user->phone = '1234567890';
    $user->save();
```

- By using the ``` create()``` method

```php
    $user = User::create([
        'first_name' => 'Prasad',
        'last_name' => 'Chinwal',
        'phone' => '1234567890',
    ]);
```

> #### Note:
>
> For ```create()``` method you might want to set the ```fillable``` property on your model to avoid Mass assignment exception.

## How to update the data 💁‍♂️

- By using the ``` save()``` method

```php
$user = App\User::find(1);
$user->phone = '0987654321';
$user->save();
```

- By using the ``` update()``` method (Mass updates)

```php
App\User::where('is_logged_in', true)->update([
    'loggedin_at' => Carbon::now();
]);
```

> #### Note:
>
> For ```update()``` method you might want to set the ```fillable``` property on your model to avoid Mass assignment exception.

## How to delete the data 😨

- Using the ``` delete()``` method

```php
$user = App\User::find(1);

$user->delete();
```

Example 2

```php
$deletActiveUsers = App\User::where('is_logged_in', true)->delete();
```

- Using the ``` destroy()``` method

```php
App\User::destroy(1);
```

## Conclusion

Laravel Eloquent gives us nice API to work with database. These are just few of these methods discussed here. There are so many more methods which can be used as per your requirements. You can find these methods in the [Eloquent documentations](https://laravel.com/docs/7.x/eloquent).