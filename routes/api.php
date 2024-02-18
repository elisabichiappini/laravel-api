<?php

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//importo modello Project
use App\Models\Project;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//rotta per api che genera questo url = http://127.0.0.1:8000/api/projects
Route::get('projects',[ProjectController::class, 'index']);
//rotta per api ma per visualizzare dettaglio progetto
Route::get('projects/{slug}', [ProjectController::class, 'show']);