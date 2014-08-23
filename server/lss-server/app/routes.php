<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
Resource Controlers
http://laravel.com/docs/controllers#resource-controllers

CRUDy route(s)
stories
[ ] Create story
[ ] Read story
[ ] Update sotry
[ ] Destroy sotry

Response
[ ] Create response
[ ] Read response
[ ] Update response
[ ] Destroy resonse

Login
[ ] Login
[ ] Logout
**/


/*
 *  Actions handled by the Resource Controller
 *	
 *	|Verb	   | Path	                   | Action	 | Route Name          |
 *  |----------| ------------------------- |---------|---------------------| 
 *	|GET	   | /resource	               | index	 | resource.index      |
 *	|GET	   | /resource/create	       | create	 | resource.create     |
 *	|POST	   | /resource	               | store	 | resource.store      |
 *	|GET       | /resource/{resource}	   | show	 | resource.show       |
 *	|GET       | /resource/{resource}/edit | edit	 | resource.edit       |
 *	|PUT/PATCH | /resource/{resource}	   | update	 | resource.update     |
 *	|DELETE	   | /resource/{resource}	   | destroy | resource.destroy    |
 *
*/


Route::get('/', function()
{
	return View::make('hello');
});

Route::resource('','');