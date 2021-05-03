## Development challenge for PHP

This challenge aims to test basic skills in PHP development and a bit of data / entity modeling. The idea is to build an HTTP REST API.


Includes endpoints with REST API specification:

#Parameters:

Fields: to choose the specific fields. For example, `movies?fields=title,release_date` 

Sort: to sort by one or more specific fields, use the sign `-` to indicate DESC. `actors?sort=birth_date,-name` 

Include: with this parameter we bring the relations. Accepts multiple parameters. for example. `classification?include=movies,series`

Filter: allows you to filter by any field. for example,`movies?title=pokemon&release_date=2021`


Per_page: allows defining how many records we want per page, accompanied by `page`, where we indicate what page number we want. For example, `episodes?per_page=5&page=2`


<b>INCLUDE</b>

- Models.
- Controllers.
- Migrations. 
- Factories.
- Routes.
- EndPoints
- Tests.
- Api authentication with JWT.
- Friendly routes with slug generator.

## Requirements to deploy

Please clone the repository, enter the generated folder and configure the `.env` file with the `.env.example` template.

Run `php artisan key:generate --ansi` to generate the key in the `.env` file.

Run `composer update` to install all the dependecies.

Run `php artisan cache:clear` and `php artisan config:clear`.

Run `php artisan jwt:secret` to generate the secret key in the `.env` file.

Run the migrations with `php artisan migrate`.

Populate the tables by running the command `php artisan db:seed`.


```php
    
    # DatabaseSeeder.php

    Genre::factory(5)->create();
    Classification::factory(5)->create();
    Actor::factory()->count(50)->create();
    Director::factory(20)->create();
    Movie::factory(30)->create()->each(function ($movie) {
        $movie->actors(['actorable_id' => rand(1, 10)])->attach($this->array(rand(1, 50)));
    });
    Serie::factory(10)->create();
    Season::factory(20)->create();
    Episode::factory(200)->create()->each(function ($episode) {
        $episode->actors()->attach($this->array(rand(1, 50)));
    });

```

When seeding the database, a user will be created with the mail `admin@admin.com` and its password will be `adminadmin`.


```php

	 User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin'),
        ]);
     
```

You can run the tests by executing the `php artisan test` command.

Lift up the server with `php artisan serve`.

Use [Postman](https://www.postman.com/) or [Insomnia](https://insomnia.rest/) to test the endpoints.
