## Development challenge for PHP

This challenge aims to test basic skills in PHP development and a bit of data / entity modeling. The idea is to build an HTTP REST API.

<b>INCLUDE</b>

- Models.
- Controllers.
- Migrations. 
- Factories.
- Routes.
- Tests.
- Api authentication with JWT.
- Friendly routes with slug generator.

## Requirements to deploy

Please clone the repository and configure the `.env` file.

Enter the generated folder and run `npm install && npm run dev`.

Run the migrations with `php artisan migrate`.

Populate the tables by running the command `php artisan db:seed`.


```php
    
    DatabaseSeeder.php

    Gender::factory(5)->create();
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
