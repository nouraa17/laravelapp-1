<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
////////////////////////////////////////////Lec2///////////////////////////////////////////////////////////////

Route::get('test', function () { //function () -> anonymous fun
    return "Welcome to my first laravel project";
});
///////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/test1/{id}', function ($id) {
    return "The ID is: " . $id;
});
///////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/test2/{ig?}', function ($id = 0) {  //ig is the programming def but $id is the var that = ig
    return "The ID is: " . $id;
});
///////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/test3/{id?}', function ($id = 0) { //id is optional
    return "The ID is: " . $id;
})->where(['id' => '[0-9]+']);
///////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/test4/{n?}', function ($id = 0) {
    return "The ID is: " . $id;
})->whereNumber('n');
///////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/test5/{name?}', function ($name = 'nourhan') {
    return "The Name is: " . $name;
})->whereAlpha('name');
///////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/test6/{id}/{name}', function ($id, $name) {
    return "The ID is: " . $id . " & Name is: " . $name;
})->where(['id' => '[0-9]+', 'name' => '[a-zA-Z]+']);
///////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/product/{pro}', function ($pro) {
    return "The product is: " . $pro;
})->whereIn('pro', ['laptop', 'pc', 'mobile']);
///////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::prefix('networks')->group(function () {
    Route::get('/lan', function () {
        return "LAN";
    });
    Route::get('/wan', function () {
        return "WAN";
    });
    Route::get('/man', function () {
        return "MAN";
    });
});
///////////////////////////////////////////////////////////////////////////////////////////////////////////

// Route::fallback(function () {
//     return redirect('/');
// });
///////////////////////////////////////////////////////////////////////////////////////////////////////////

// Route::get('/first', function () {
//     return view('test');
// });
///////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/food', function () {
    return view('food');
});
///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Task 2
//
Route::get('/about', function () {
    return view('about');
});
//////////////////////////////////////////
Route::get('/contact', function () {
    return "<h1>This is Contact Us page</h1>";
});
//////////////////////////////////////////
Route::prefix('blog')->group(function () {
    Route::get('science', function () {
        return "<h1>This is Science page</h1>";
    });
    Route::get('sports', function () {
        return "<h1>This is Sports page</h1>";
    });
    Route::get('math', function () {
        return "<h1>This is Math page</h1>";
    });
    Route::get('medical', function () {
        return "<h1>This is Medical page</h1>";
    });
});
////////////////////////////////////////////Lec3///////////////////////////////////////////////////////////////

Route::get('/login', function () {
    return view('login');
});
///////////////////////////////////////////////////////////////////////////////////////////////////////////

// Route::post('/logged', function () {
//     return "<h2>You are logged in</h2>";
// })->name('logged');
///////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('control', [ExampleController::class, 'show']);
///////////////////////////////////////////////////////////////////////////////////////////////////////////

//Task3
Route::any('/logged', [FormController::class, 'formSubmission'])->name('logged');

////////////////////////////////////////////Lec4///////////////////////////////////////////////////////////////

// Route::prefix('cars')->group(function () {
//     // Route::get('storeCar', [CarController::class, 'store']);
//     Route::get('home', [CarController::class, 'index']);
//     Route::get('createCar', [CarController::class, 'create']);
//     Route::post('storeCar', [CarController::class, 'store'])->name('storeCar');

// });


///////////////////////////////////////////////////////////////////////////////////////////////////////////

//Task4
//addPost.blade.php
//posts.blade.php
//PostsController.php
//Post.php model

// Route::prefix('posts')->group(function () {
Route::get('posts', [PostsController::class, 'index'])->name('posts');
Route::get('/createPost', [PostsController::class, 'create']);
Route::post('/storePost', [PostsController::class, 'store'])->name('storePost');
// });

////////////////////////////////////////////Lec5///////////////////////////////////////////////////////////////
Route::get('cars', [CarController::class, 'index'])->name('cars');
Route::get('createCar', [CarController::class, 'create']);
Route::get('showCar/{id}', [CarController::class, 'show']);
Route::get('editCar/{id}', [CarController::class, 'edit'])->whereNumber('id');
Route::put('updateCar/{id}', [CarController::class, 'update'])->name('updateCar');
Route::post('storeCar', [CarController::class, 'store'])->name('storeCar');
///////////////////////////////////////////////////////////////////////////////////////////////////////////
//Task5
Route::get('editPost/{id}', [PostsController::class, 'edit'])->whereNumber('id');
Route::get('showPost/{id}', [PostsController::class, 'show']);
Route::put('updatePost/{id}', [PostsController::class, 'update'])->name('updatePost');

////////////////////////////////////////////Lec6///////////////////////////////////////////////////////////////
Route::get('deleteCar/{id}', [CarController::class, 'destroy']);
Route::get('trashedCar', [CarController::class, 'trashed']);
Route::get('forceDelete/{id}', [CarController::class, 'forceDelete'])->name('forceDelete');
Route::get('restoreCar/{id}', [CarController::class, 'restore']);

///////////////////////////////////////////////////////////////////////////////////////////////////////////
//Task6
Route::get('deletePost/{id}', [PostsController::class, 'destroy']);
Route::get('trashedPost', [PostsController::class, 'trashed']);
Route::get('forceDeleteP/{id}', [PostsController::class, 'forceDelete']);
Route::get('restorePost/{id}', [PostsController::class, 'restore']);

////////////////////////////////////////////Lec7///////////////////////////////////////////////////////////////

Route::get('/first', function () {
    return view('test');
});

Route::get('/upimg', function () {
    return view('upimage');
});
Route::post('/imageUpload', [ExampleController::class, 'upload'])->name('imageUpload');