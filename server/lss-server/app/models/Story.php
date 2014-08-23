<?php

class Story extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stories';
	
	
	/**
	* Get  of stories from the database
	* @pram null
	* @response (obj) title, text, path to file, distance 
	**/	
	 public function replies()
    {
        return $this->hasMany('reply');
    }
	
	
}
