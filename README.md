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
- friendly routes with slug generator.

## requirements to deploy

Please clone the repository.
Enter the generated folder and run npm install && npm run dev.
Run the migrations with php artisan migrate.
Populate the tables by running the command php artisan db:seed.
You can run the tests by executing the php artisan test command, this command will also populate the tables with auto-generated data.
Lift up the server with php artisan serve.