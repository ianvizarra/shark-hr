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

Route::inertia('/', 'Welcome')->name('index');

Auth::routes();

/*
 * Load all module routes
 *
 */
foreach (glob(__DIR__."/modules/*.php") as $route) {
    include $route;
}
