<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource("recipes", "RecipesController");
Route::resource("ingredients", "IngredientsController")->except(["show"]);
Route::post("/ingredients/updateCount", "IngredientsController@updateCount")->name("ingredient.updateCount");
Route::get("/home", function() {
   return redirect()->route("recipes.index");
});
