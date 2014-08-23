<?php

class ReplyController extends \BaseController {

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

		# the story id
		$reply->story_id = $data['story_id'];
		
		# the user id
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
		
		# Eloquent magic
		$reply->save();
		
		
		#distance 
		function calculateDistance($latitude1, $longitude1, $latitude2, $longitude2) {
		    $theta = $longitude1 - $longitude2;
		    $miles = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
		    $miles = acos($miles);
		    $miles = rad2deg($miles);
		    $miles = $miles * 60 * 1.1515;
		    return $miles; 	
		}		
		
		#Get the the lat and long from the distance table, origin
		$OG_distance = Distance::find($data['story_id']);
		
		# OG distance
		$point1_lat = $OG_distance->location_current_lat;
		$point1_lng = $OG_distance->location_current_long;
		
		# User Distance
		$point2_lat = $data['location_current_lat'];
		$point2_lng = $data['location_current_long'];
		
		$p2p_distance = calculateDistance($point1_lat, $point1_lng, $point2_lat,$point2_lng);
		
		$distance = new Distance();
		
		$distance->distance_traveled = $p2p_distance;
			
		$distance->reply_id = $reply->id;
		
		$distance->location_current_lat = $data['location_current_lat'];
		
		$distance->location_current_long = $data['location_current_long'];
		
		$distance->save();
		
		return $distance;
	
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
