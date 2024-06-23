<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

Route::resource('tasks', TaskController::class)->only(['index', 'store', 'update', 'destroy']);