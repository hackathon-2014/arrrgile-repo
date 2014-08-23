<?php

class Reply extends Eloquent {

	public function stories()
    {
        return $this->belongsTo('Story');
    }
	public function distance() #name of fn can be what ever 
    {
        return $this->hasOne('Distance'); #Refer the model 
    }
	
}