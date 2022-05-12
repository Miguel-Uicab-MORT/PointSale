<?php

use App\Http\Livewire\Category;
use App\Http\Livewire\Inventory;
use App\Http\Livewire\PointSale;
use App\Http\Livewire\Reports;
use App\Http\Livewire\Roles;
use App\Http\Livewire\Users;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('Category', Category::class)->middleware('auth')->name('category.index');

Route::get('Inventory', Inventory::class)->middleware('auth')->name('inventory.index');

Route::get('PointSale', PointSale::class)->middleware('auth')->name('pointsale.create');

Route::get('Reports', Reports::class)->middleware('auth')->name('reports.index');

Route::get('Users', Users::class)->middleware('auth')->name('users.index');

Route::get('Roles', Roles::class)->middleware('auth')->name('roles.index');


