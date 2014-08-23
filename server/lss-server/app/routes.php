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
[x] Read story
[ ] Update sotry
[ ] Destroy sotry
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

Route::resource('api/distance','DistanceController');

Route::resource('api/reply','ReplyController');

Route::resource('api/story','StoryController');


Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

	echo 'hostname:' . gethostname() . '<br>';
    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';
});

