<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('v1')->group(function () {

    /* exemplo
    Route::get('/users', function () {
        // Matches The "/api/v1/users" URL
    });
    */

    Route::get('/ping', function(){
        return ['pong' => true];
    });

    Route::post('/auth/login', [AuthController::class, 'login']);

    Route::middleware('auth:api')->post('/auth/logout', [AuthController::class, 'logout']);

    Route::middleware('auth:api')->prefix('user')->group(function () {
    

        Route::post('/create', [AuthController::class, 'create']);

    });

    Route::get('/unauthenticated', function() {
        return ['error' => 'Usuário não está logado.'];
    })->name('login');



    
    
    // Route::middleware('auth:api')->get('/auth/me', [AuthController::class, 'me']);

});





// CRUD do todo
// POST /todo = Inserir uma tarefa no sistema
// GET /todos = Ler todas as tarefas do sistema
// GET /todo/2 = Ler uma tarefa específica do sistema
// PUT /todo/2 = Atualizar uma tarefa no sistema
// DELETE /todo/2 = Deletar uma tarefa no sistema
/*
Route::middleware('auth:api')->post('/todo', [ApiController::class, 'createTodo']);
Route::get('/todos', [ApiController::class, 'readAllTodos']);
Route::get('/todo/{id}', [ApiController::class, 'readTodo']);
Route::middleware('auth:api')->put('/todo/{id}', [ApiController::class, 'updateTodo']);
Route::middleware('auth:api')->delete('/todo/{id}', [ApiController::class, 'deleteTodo']);
*/





 // api/v1
 /*
Route::group( ['prefix' => 'v1', 'namespace' => 'api/v1'], function () {

    Route::get('/tasks', 'TaskController@index');
    Route::post('/tasks', 'TaskController@store');

    Route::delete('/tasks/{id}', 'TaskController@destroy');


});
*/
// Route::prefix('v1')->group(function () {

//     Route::get('/users', function () {
//         // Route assigned name "admin.users"...
//     })->name('users');

//     // Route::get( '/ping' ,  function(){
//     //     return [
//     //         'pong' => true
//     //     ];
//     // });


// });


