<?php

class Distance extends Eloquent {
	
	public function reply() #name of fn can be what ever 
    {
        return $this->belongsTo('Reply'); #Refer the model 
    }


	
}
