<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::pattern('id','([0-9]+)');
Route::pattern('slug','(.*)');
Route::pattern('page','([0-9]+)');

Route::get('/pass',function(){
	return bcrypt('12345678');
});

Route::namespace('Auth')->group(function () {
   	
   	Route::get('/login',[
		'uses'=>'AuthController@getLogin',
		'as'=>'auth.login',
	]);
	Route::post('/login',[
		'uses'=>'AuthController@postLogin',
		'as'=>'auth.login',
	]);
	Route::get('/logout',[
		'uses'=>'AuthController@logout',
		'as'=>'auth.logout',
	]);
});
Route::namespace('Admin')->middleware('auth')->group(function () {
   	Route::prefix('admin')->group(function(){
   		Route::get('/',[
				'uses'=>'AdminStoryController@index',
				'as'=>'admin.story.index',
			]);
   		Route::prefix('users')->group(function(){
		   	Route::get('/',[
				'uses'=>'AdminUsersController@index',
				'as'=>'admin.users.index',
			]);
			Route::get('/edit/{page}/{id}',[
				'uses'=>'AdminUsersController@getEdit',
				'as'=>'admin.users.edit',
			]);
			Route::post('/edit/{page}/{id}',[
				'uses'=>'AdminUsersController@postEdit',
				'as'=>'admin.users.edit',
			]);
			Route::get('/add',[
				'uses'=>'AdminUsersController@getAdd',
				'as'=>'admin.users.add',
			])->middleware('cnewsauth:admindemo');
			Route::post('/add',[
				'uses'=>'AdminUsersController@postAdd',
				'as'=>'admin.users.add',
			]);
			Route::get('/del/{page}/{id}',[
				'uses'=>'AdminUsersController@del',
				'as'=>'admin.users.del',
			]);
		});


		Route::prefix('story')->group(function(){
		   	Route::get('/',[
				'uses'=>'AdminStoryController@index',
				'as'=>'admin.story.index',
			]);
			Route::get('/edit/{page}/{id}',[
				'uses'=>'AdminStoryController@getEdit',
				'as'=>'admin.story.edit',
			]);
			Route::post('/edit/{page}/{id}',[
				'uses'=>'AdminStoryController@postEdit',
				'as'=>'admin.story.edit',
			]);
			Route::get('/add',[
				'uses'=>'AdminStoryController@getAdd',
				'as'=>'admin.story.add',
			]);
			Route::post('/add',[
				'uses'=>'AdminStoryController@postAdd',
				'as'=>'admin.story.add',
			]);
			Route::get('/del/{page}/{id}',[
				'uses'=>'AdminStoryController@del',
				'as'=>'admin.story.del',
			]);
			Route::any('/search',[
				'uses'=>'AdminStoryController@search',
				'as'=>'admin.story.search',
			]);
		});

		Route::prefix('cat')->group(function(){
		   	Route::get('/',[
				'uses'=>'AdminCatController@index',
				'as'=>'admin.cat.index',
			]);
			Route::get('/edit/{id}',[
				'uses'=>'AdminCatController@getEdit',
				'as'=>'admin.cat.edit',
			]);
			Route::post('/edit/{id}',[
				'uses'=>'AdminCatController@postEdit',
				'as'=>'admin.cat.edit',
			]);
			Route::get('/add',[
				'uses'=>'AdminCatController@getAdd',
				'as'=>'admin.cat.add',
			]);
			Route::post('/add',[
				'uses'=>'AdminCatController@postAdd',
				'as'=>'admin.cat.add',
			]);
			Route::get('/del/{id}',[
				'uses'=>'AdminCatController@del',
				'as'=>'admin.cat.del',
			]);
		});


		Route::prefix('contact')->group(function(){
		   	Route::get('/',[
				'uses'=>'AdminContactController@index',
				'as'=>'admin.contact.index',
			]);
			Route::get('/edit/{page}/{id}',[
				'uses'=>'AdminContactController@getEdit',
				'as'=>'admin.contact.edit',
			]);
			Route::post('/edit/{page}/{id}',[
				'uses'=>'AdminContactController@postEdit',
				'as'=>'admin.contact.edit',
			]);
			Route::get('/add',[
				'uses'=>'AdminContactController@getAdd',
				'as'=>'admin.contact.add',
			]);
			Route::post('/add',[
				'uses'=>'AdminContactController@postAdd',
				'as'=>'admin.contact.add',
			]);
			Route::get('/del/{page}/{id}',[
				'uses'=>'AdminContactController@del',
				'as'=>'admin.contact.del',
			]);
		});
	});
});

Route::namespace('Cnews')->group(function () {
   	
	   	Route::get('/',[
			'uses'=>'CnewsIndexController@index',
			'as'=>'cnews.index.index',
		]);
		
		Route::get('/trang-chu',[
			'uses'=>'CnewsNewsController@index',
			'as'=>'cnews.news.index',
		]);
		Route::get('/detail/{slug}-{id}.html',[
			'uses'=>'CnewsNewsController@detail',
			'as'=>'cnews.news.detail',
		]);
		Route::get('/cat/{slug}-{cid}.html',[
			'uses'=>'CnewsNewsController@cat',
			'as'=>'cnews.news.cat',
		]);
		
		Route::get('/count',[
			'uses'=>'CnewsNewsController@count',
			'as'=>'cnews.news.count',
		]);


});


