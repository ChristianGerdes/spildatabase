<?php

Route::middleware(['auth', 'admin'])->group(function()
{
    Route::middleware(['admin'])->group(function() {
        Route::get('games/review', 'ReviewGamesController@index')->name('reviews.index');

        Route::get('/admins', 'AdminsController@index')->name('admins.index');
        Route::get('/admins/{user}/add', 'AdminsController@store')->name('admins.store');
        Route::get('/admins/{user}/remove', 'AdminsController@destroy')->name('admins.destroy');

        Route::get('/games/{game}/edit', 'GamesController@edit')->name('games.edit');
        Route::put('/games/{game}', 'GamesController@update')->name('games.update');
    });

    Route::post('/games', 'GamesController@store')->name('games.store');
    Route::get('/games/create', 'GamesController@create')->name('games.create');
});

Route::redirect('/', '/games', 301);

Route::get('/games/popular', 'PopularGamesController@index')->name('games.popular');
Route::get('/games/newest', 'NewestGamesController@index')->name('games.newest');

Route::get('/games', 'GamesController@index')->name('games.index');
Route::get('/games/{game}', 'GamesController@show')->name('games.show');

Route::resource('contributors', 'ContributorsController');
Route::resource('publishers', 'PublishersController');

Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::post('/users', 'UsersController@store')->name('users.store');
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store')->name('sessions.store');
Route::get('/logout', 'SessionsController@destroy')->name('sessions.destroy');