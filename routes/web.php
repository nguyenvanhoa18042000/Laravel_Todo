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
Route::get('home', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
});

Route::get('task/complete/{id}' , function($id){
	dd('Hoàn thành '.$id);
})->name('todo.task.complete');

Route::get('task/reset/{id}' , function($id){
	dd('Làm lại '.$id);
})->name('todo.task.reset');

//route group cách 1
Route::group(['prefix' => 'task'] , function(){
	Route::get('complete/{id}' , function($id){
		dd('Hoàn thành '.$id);
	})->name('todo.task.complete');
	Route::get('reset/{id}' , function($id){
		dd('Làm lại '.$id);
	})->name('todo.task.reset');
});

//route group cách 2
Route::prefix('task')->group(function(){
	Route::get('complete/{id}' , function($id){
		dd('Hoàn thành '.$id);
	})->name('todo.task.complete');

	Route::get('reset/{id}' , function($id){
		dd('Làm lại '.$id);
	})->name('todo.task.reset');
});


// Route::get('/user', function () {
//     $a = 10 * 10;
//     dd($a);
// });

// Route::delete('/task/delete', function () {
//     dd('delete');
// });

// Route::delete('/task/delete/{id}', function ($id) {
// 	dd($id);
//     return redirect('/thanhcong');
// });

// Route::get('/thanhcong', function () {
//     dd('xóa thành công');
// });

// Route::get('user/{id}', function($id) {
//     return 'User ' . $id;
// });

// Route::get('user/{id?}', function($id = null) {
//     if ($id == null) {
//         return 'List users';
//     }
    
//     return "User $id";
// });

// Route::get('/user/{id}/post/{post}', function($id, $idPost) {
//     return "This is post $idPost of user $id"; 
// });

// Route::get('/user/{id}/post/{post}/{name}', function($id, $idPost,$name) {
//     return "This is post $idPost of user $id $name"; 
// });

// Route::delete('/task/delete/{id}', function ($id) {
//      // return redirect('home');
// })->name('todo.task.delete');

// Route::prefix('task')->group(function () {
//     Route::get('delete', function () {
//     dd('delete');
// 	})->name('todo.task.delete');
// });