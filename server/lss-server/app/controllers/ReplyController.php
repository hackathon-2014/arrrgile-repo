<?php

class ResponseController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		#Reply
		# post data					
		$data = Input::all();	

		$reply = new Reply();
		
		# The the text string that tells the story
		$reply->text = $data['text'];

		$reply->story_id = $story->id;
		
		$reply->user_id = $data['user_id'];
	
		# if the file is provide, do the following, please! 
		if(isset($data['file_name']))
		{	
			# An image as base64
			#decode will be jpeg
			$image = base64_decode($data['file_name']);
			
			# path to root and img folder
			$destinationPath = public_path() . "/img/";
				
			$fileName = bin2hex(mcrypt_create_iv(8, MCRYPT_DEV_URANDOM));
							
			file_put_contents($destinationPath . $fileName .'.jpeg', $image);
			
			#store location in db
			$reply->file_name = $fileName .'.jpeg';
		}	
		
		$story->replies()->save($reply);
		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
	}


}
