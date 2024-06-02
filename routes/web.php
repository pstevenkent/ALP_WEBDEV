<?php
use Ipjluminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeBeanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProducerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VarietalController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('aboutus', [
        "pagetitle" => "Home",
        "maintitle" => "Welcome to Hana's Roastery Website"
    ]);
});

Route::resource('coffeebean', CoffeeBeanController::class);

Route::group(['prefix' => 'coffeebean'], function () {
    Route::get('/', [CoffeeBeanController::class, 'index'])->name('coffeebean.index')->middleware('auth');
    Route::get('create', [CoffeeBeanController::class, 'create'])->name('coffeebean.create')->middleware('auth');
    Route::post('/', [CoffeeBeanController::class, 'store'])->name('coffeebean.store')->middleware('auth');
    Route::get('{coffeebean}/edit', [CoffeeBeanController::class, 'edit'])->name('coffeebean.edit')->middleware('auth');
    Route::put('{coffeebean}', [CoffeeBeanController::class, 'update'])->name('coffeebean.update')->middleware('auth');
    Route::delete('{coffeebean}', [CoffeeBeanController::class, 'destroy'])->name('coffeebean.destroy')->middleware('auth');
});

Route::resource('menu', MenuController::class);

Route::group(['prefix' => 'menu'], function () {
    Route::get('/', [MenuController::class, 'index'])->name('menu.index')->middleware('auth');
    Route::get('create', [MenuController::class, 'create'])->name('menu.create')->middleware('auth');
    Route::post('/', [MenuController::class, 'store'])->name('menu.store')->middleware('auth');
    Route::get('{menu}/edit', [MenuController::class, 'edit'])->name('menu.edit')->middleware('auth');
    Route::put('{menu}', [MenuController::class, 'update'])->name('menu.update')->middleware('auth');
    Route::delete('{menu}', [MenuController::class, 'destroy'])->name('menu.destroy')->middleware('auth');
});

Route::resource('varietal', VarietalController::class);

Route::group(['prefix' => 'varietal'], function () {
    Route::get('/', [VarietalController::class, 'index'])->name('varietal.index')->middleware('auth');
    Route::get('create', [VarietalController::class, 'create'])->name('varietal.create')->middleware('auth');
    Route::post('/', [VarietalController::class, 'store'])->name('varietal.store')->middleware('auth');
    Route::get('{varietal}/edit', [VarietalController::class, 'edit'])->name('varietal.edit')->middleware('auth');
    Route::put('{varietal}', [VarietalController::class, 'update'])->name('varietal.update')->middleware('auth');
    Route::delete('{varietal}', [VarietalController::class, 'destroy'])->name('varietal.destroy')->middleware('auth');
});

Route::resource('producer', ProducerController::class);

Route::group(['prefix' => 'producer'], function () {
    Route::get('/', [ProducerController::class, 'index'])->name('producer.index')->middleware('auth');
    Route::get('create', [ProducerController::class, 'create'])->name('producer.create')->middleware('auth');
    Route::post('/', [ProducerController::class, 'store'])->name('producer.store')->middleware('auth');
    Route::get('{producer}/edit', [ProducerController::class, 'edit'])->name('producer.edit')->middleware('auth');
    Route::put('{producer}', [ProducerController::class, 'update'])->name('producer.update')->middleware('auth');
    Route::delete('{producer}', [ProducerController::class, 'destroy'])->name('producer.destroy')->middleware('auth');
});

// Route::get('/beanview', [CoffeeBeanController::class, 'index'])->name('beanview')->middleware('auth');
// Route::get('/singularbean/{coffeebean}', [CoffeeBeanController::class, 'show'])
//     ->name('singularbean')
//     ->middleware('auth');
// Route::get('/menu', [MenuController::class, 'index'])->name('menuview')->middleware('auth');

Route::view('/home', 'home', [
    "pagetitle" => "Home",
    "maintitle" => ""
])->name('home');

Route::view('/information', 'information', [
    "pagetitle" => "Information",
    "maintitle" => ""
])->name('information');

Route::view('/aboutus', 'aboutus', [
    "pagetitle" => "About",
    "maintitle" => ""
])->name('aboutus');

Route::view('/checkout', 'checkout', [
    "pagetitle" => "checkout",
    "maintitle" => ""
])->name('checkout')->middleware('auth');

Route::view('/payment', 'payment', [
    "pagetitle" => "payment",
    "maintitle" => ""
])->name('payment')->middleware('auth');

// Cart Routes
Route::get('/cart', [CartController::class, 'show'])->name('cart')->middleware('auth');
Route::post('/add-to-cart/{coffeeBean}', [CoffeeBeanController::class, 'addToCart'])->name('add-to-cart');
Route::post('/update-cart-quantity', [CartController::class, 'updateCartQuantity'])->name('update-cart-quantity');
Route::delete('/remove-from-cart/{index}', [CartController::class, 'removeFromCart'])->name('remove-from-cart');

Route::post('/update-cart-quantity', [CartController::class, 'updateCartQuantity'])->name('update-cart-quantity');
require __DIR__.'/auth.php';

