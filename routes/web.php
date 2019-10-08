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
    return redirect()->route('posts.index');
});

Auth::routes(['verify' => true]);

Route::resource('posts', 'PostController')->only(['index', 'show']);
Route::get('author/{author}', 'PostController@postsByAuthor')->name('author.posts');
Route::get('category/{category}', 'PostController@postsByCategory')->name('category.posts');
Route::get('contacts', function () {
    return view('contacts');
})->name('contacts');

Route::post('subscribe', 'SubscribeController')->name('subscribe');

Route::prefix('manage')
    ->namespace('Manage')
    ->name('manage.')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', function () {
            return redirect()->route('manage.posts.index');
        });

        Route::resource('posts', 'PostController')->except('show');

        Route::prefix('profile')
            ->name('profile.')
            ->group(function () {
                Route::get('/', 'ProfileController@edit')->name('edit');
                Route::post('/', 'ProfileController@update')->name('update');
                Route::post('password', 'PasswordController')->name('password.update');
            });

        Route::post('upload/image', 'ImageController@uploadCkeditorImage')->name('upload.ckeditor-image');
        Route::delete('media/{media}', 'ImageController@deleteMedia')->name('delete.media');
    });

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware(['verified', 'auth']);
