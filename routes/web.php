<?php

use App\Http\Controllers\ParquetController;
use App\Http\Controllers\ProfileController;
use App\Models\Parquet;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get("/", [ParquetController::class, "index"])->name("store.list");

Route::get("/proizvod/{id}", [ParquetController::class, "single"])->name("store.single");

Route::get("/admin/products", [ParquetController::class, "product_list"])->name("products");

Route::get("/admin/users", [ProfileController::class, "user_list"])->name("users");

Route::get("/admin/del_p/{id}", [ParquetController::class, "delete_p"])->name("deletep");
Route::get("/admin/del_pc/{id}", [ParquetController::class, "delete_pc"])->name("deletepc");

Route::get("/admin/del_u/{id}", [ProfileController::class, "delete_u"])->name("deleteu");
Route::get("/admin/del_uc/{id}", [ProfileController::class, "delete_uc"])->name("deleteuc");


Route::get("/admin/add_p", [ParquetController::class, "add_p"])->name("addp");
Route::post("/admin/add_p", [ParquetController::class, "add_pc"])->name("addpc");

Route::get("/admin/add_u", [ProfileController::class, "add_u"])->name("addu");
Route::post("/admin/add_u", [ProfileController::class, "add_uc"])->name("adduc");

Route::get("/admin/edit_u/{id}", [ProfileController::class, "edit_u"])->name("editu");
Route::post("/admin/edit_u/{id}", [ProfileController::class, "edit_uc"])->name("editu");

Route::get("/admin/edit_p/{id}", [ParquetController::class, "edit_p"])->name("editp");
Route::post("/admin/edit_p/{id}", [ParquetController::class, "edit_pc"])->name("editp");

Route::get('/admin/dashboard', function () {
    if (auth()->check() && auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {
        return view('dashboard');
    }

    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post("/cart/add/{id}", [ParquetController::class, "addToCart"])->name("addtocart");
Route::get("/cart", [ParquetController::class, "viewCart"])->name("cart");
Route::delete("/cart/remove/{id}", [ParquetController::class, "removeFromCart"])->name("cart.remove");

require __DIR__.'/auth.php';
