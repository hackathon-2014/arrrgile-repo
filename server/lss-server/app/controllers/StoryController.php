
<?php

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

class StoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * Get a number of stories from the database
	 * @pram null
	 * @response (obj) title, text, path to file, distance 
	 **/	
	public function index()
	{
		# get all the stories
		$stories = Story::with('replies.distance')->get();
		
		# return as json format 
		return Response::json($stories)->setCallback(Input::get('callback'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 */
	public function create($storyData = null)
	{
		
		return 'create';
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	
	public function store()
	{	
		#Story
		# post data					
		$data = Input::all();	
		
		# Instantiate new model instance
		$story = new Story();
		
		# The title of the story
		$story->title = $data['title'];
		
		# The text of the story
		$story->text = $data['text'];
				
		# fk of user id
		$story->user_id = $data['user_id'];
		
		# Eloquent, do yo thang! 
		try
		{
			
			$story->save();
		}
		
		catch(Exception $e)
		{
			return Response::json($e);
		}
		
		$reply = new Reply();
		
		# The the text string that tells the story
		$reply->text = $data['text'];

		$reply->story_id = $story->id;
		
		$reply->user_id = $data['user_id'];
		
		# An image as base64
		#decode will be jpeg
		$image = base64_decode($data['file_name']);
		
		# path to root and img folder
		$destinationPath = public_path() . "/img/";
		
		$fileName = bin2hex(mcrypt_create_iv(8, MCRYPT_DEV_URANDOM));
						
		file_put_contents($destinationPath . $fileName .'.jpeg', $image);
		
		#store location in db
		$reply->file_name = $fileName .'.jpeg';
		
		
		$story->replies()->save($reply);
		
		
		# Distance
		$distance = new Distance();
		
		# fk of the sotry @ stories table
		$distance->reply_id = $reply->id;
		
		
		# Distance the sotry has traveled, 0 as it is a new story
		$distance->distance_traveled = 0;
		
		#Current Latitude (SPARC HQ)
		$distance->location_current_lat = $data['location_current_lat'];
		
		# Current Longitude (SPARC HQ)
		$distance->location_current_long =  $data['location_current_long'];
		
		# Eloquent, do yo thang! 
		try
		{
			
			# Eloquent Magic
			$reply->distance()->save($distance);
			
			return Response::json($story)->setCallback(Input::get('callback'));
		
		}
		
		catch(Exception $e)
		{
			
			return Response::json($e);
		
		}
		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		# get all the stories
		//$stories = Story::find($id);
		
		# Get the story and the the id
		$story = Story::with('replies.distance')->find($id);
		
		# return as json format 
		return Response::json($story)->setCallback(Input::get('callback'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		return 'edit';
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		return 'update';
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		return 'destroy';
	}


}
