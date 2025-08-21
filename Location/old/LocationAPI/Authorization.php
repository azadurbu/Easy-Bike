<?php

Class Authorization
{
	function API_KEY()
	{
		header("Content-Type:application/json");
		
		$seceretKey = '123456789';
		
		$headers = apache_request_headers();
		
		if(isset($headers['App_Key']))
		{
			$api_key = $headers['App_Key'];
			
			if($api_key != $seceretKey) 
			{
				return false;
			}
			else
			{
				return true;
			}
		}
	}
}



?>