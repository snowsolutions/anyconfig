<?php
use Illuminate\Support\Facades\Route;
use \SnowSolution\AnyConfig\Http\Controllers\ConfigurationController;
Route::get('/anyconfig', [ConfigurationController::class, 'index'])->name('anyconfig.index');