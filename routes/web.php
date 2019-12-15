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
})->name('welcome');

Route::get('/', function () {
    return view('home');
});

// Route::get('/', 'HomeController@index');
// Route::get('page/{page?}', 'HomeController@index');
Route::get('setting1', 'SettingController@index');
// Route::get('setting2', 'Admin\SettingController@index');
// Route::get('setting3', 'Admin\Test\SettingController@index');

Route::group(['namespace' => 'Admin'] , function(){
	Route::get('dashboard', 'DashboardController@index');
	Route::get('setting2', 'SettingController@index')->name('setting2');
	Route::get('setting3', 'Test\SettingController@index');
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

Route::get('list' , function(){
	 $list = [
        [
            'name' => 'Học View trong Laravel',
            'status' => 0
        ],
        [
            'name' => 'Học Route trong Laravel',
            'status' => 1
        ],
        [
            'name' => 'Làm bài tập View trong Laravel',
            'status' => -1
        ],
    ];
	return view('list',[
		'list' => $list
	]);
});

Route::get('profile' , function(){
	$name = 'Nguyễn Văn Hòa';
	$birthday = '2000';
	$school = 'PTIT';
	$address = 'Hà Đông -HN';
	$introduce = '<h1>Tên mình là Nguyễn Văn Hòa</h1>
	<h2>Yêu màu hồng</h2>
	<h3>Vui vẻ , hòa đồng</h3>
	<h4>Hay chơi thể thao</h4>
	<h5>Thích nghe nhạc , đi du lịch ....</h5>';
	$goal = 'Lương triệu đô';

	return view('profile',[
		'name' => $name,
		'birthday' => $birthday,
		'school' => $school,
		'address' => $address,
		'introduce' => $introduce,
		'goal' => $goal
	]);
});
// Route::resource('task', 'Frontend\TaskController');
Route::group(['namespace' => 'Frontend','as' => 'task.'] , function(){
	Route::get('task','TaskController@index')->name('index');
	Route::get('task/create','TaskController@create')->name('create');
	Route::post('task/store','TaskController@store')->name('store');
	Route::get('task/{id}','TaskController@show')->name('show');
	Route::get('task/{id}/edit','TaskController@edit')->name('edit');
	Route::put('task/{id}','TaskController@update')->name('update');
	Route::delete('task/{id}','TaskController@destroy')->name('destroy');
	Route::get('task/complete/{id}','TaskController@complete')->name('complete');
	Route::get('task/recomplete/{id}','TaskController@reComplete')->name('recomplete');
});