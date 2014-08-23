<?php

/**
CRUDy route(s)
Distance
[ ] Create 
[ ] Read 
[ ] Update 
[ ] Destroy 

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
class DistanceController extends \BaseController {

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
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  (int) $id of a story
	 * @return Response 
	 */
	public function show($id)
	{
		# get all the stories
		$distance = Distance::find($id);
		
		# return as json format 
		return Response::json($distance);
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
