<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, MovieController, SerieController, ActorController, DirectorController, GenderController, ClassificationController, EpisodeController, SeasonController };
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group([
'middleware' => 'api',
'prefix' =>'auth'
], function ($router) {
	Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
	Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
	Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
	Route::post('me', [App\Http\Controllers\AuthController::class, 'me']);

	Route::apiResources([
	             'movies' => MovieController::class,
	             'actors' => ActorController::class,
	          'directors' => DirectorController::class,
	           'episodes' => EpisodeController::class,
	   		    'seasons' => SeasonController::class,
	            'genders' => GenderController::class,
	    'classifications' => ClassificationController::class,
	             'series' => SerieController::class,
	]);
});
