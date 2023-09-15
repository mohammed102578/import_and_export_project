<?php

use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ContractorController;


Route::get('/home', function () {
    return redirect()->route('dashboard');
});
Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/payment', [App\Http\Controllers\HomeController::class, 'payment'])->name('patment');


Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/report', [App\Http\Controllers\HomeController::class, 'report'])->name('report');
    Route::get('/statistics', [App\Http\Controllers\HomeController::class, 'statistics'])->name('statistics');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/addManger', [App\Http\Controllers\HomeController::class, 'addManger'])->name('addManger');
    Route::post('/addNotes', [App\Http\Controllers\HomeController::class, 'addNotes'])->name('addNotes');
    Route::get('lang/{locale}', [App\Http\Controllers\HomeController::class, 'setLanguage'])->name('setLanguage');
	
	// Upload Excel
	Route::post('/add_excel', [App\Http\Controllers\CatController::class, 'uploadFile'])->name('uploadFile.store');
	Route::get('/cats/add_excel', [App\Http\Controllers\CatController::class, 'create'])->name('uploadFile.index');
		Route::get('/cats', [App\Http\Controllers\CatController::class, 'index'])->name('cats.index');
		Route::get('/cats/{id}', [App\Http\Controllers\CatController::class, 'destroy'])->name('cats.destroy');
	//

    Route::resource('categories', App\Http\Controllers\CategoryController::class);


    Route::resource('requests', App\Http\Controllers\RequestController::class);
//items
    Route::group(['prefix' => 'requests'], function () {

        Route::get('items/{request}', [ItemController::class, 'index'])->name('items.index');
        Route::get('items/print/{request}', [ItemController::class, 'print'])->name('items.print');
        Route::get('items/{request}/create', [ItemController::class, 'create'])->name('items.create');
        Route::post('items/{request}/store', [ItemController::class, 'store'])->name('items.store');
        Route::get('items/{request}/edit/{id}', [ItemController::class, 'edit'])->name('items.edit');
        Route::get('items/{request}/show/{id}', [ItemController::class, 'show'])->name('items.show');
        Route::patch('items/{request}/update/{id}', [ItemController::class, 'update'])->name('items.update');
        Route::get('items/{request}/destroy/{id}', [ItemController::class, 'destroy'])->name('items.destroy');
    });
    Route::group(['prefix' => 'category'], function () {

        Route::get('requests/{category}', [RequestController::class, 'index'])->name('requests.index');
        Route::get('requests/print/{category}', [RequestController::class, 'print'])->name('requests.print');
        Route::get('requests/{category}/create', [RequestController::class, 'create'])->name('requests.create');
        Route::post('requests/{category}/store', [RequestController::class, 'store'])->name('requests.store');
        Route::get('requests/{category}/edit/{id}', [RequestController::class, 'edit'])->name('requests.edit');
        Route::get('requests/{category}/show/{id}', [RequestController::class, 'show'])->name('requests.show');
        Route::patch('requests/{category}/update/{id}', [RequestController::class, 'update'])->name('requests.update');
        Route::get('requests/{category}/destroy/{id}', [RequestController::class, 'destroy'])->name('requests.destroy');
    });

    Route::resource('users', UserController::class);
    Route::get('users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::resource('suppliers', SupplierController::class);
    Route::get('suppliers/destroy/{id}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');
    Route::resource('contractors', ContractorController::class);
    Route::get('contractors/destroy/{id}', [ContractorController::class, 'destroy'])->name('contractors.destroy');
//
//    Route::group(['prefix' => 'users'], function () {

        Route::resource('roles', RoleController::class);
        Route::get('roles/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

        Route::resource('permissions', PermissionController::class);
        Route::get('permissions/destroy/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
//    });
    Route::resource('settings', App\Http\Controllers\SettingController::class);


});

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');
Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');
Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');
Route::post('generator_builder/generate-from-file', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile')->name('io_generator_builder_generate_from_file');



