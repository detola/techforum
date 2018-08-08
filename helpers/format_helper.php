<?php 
/*
* Format Date
*/
function formatDate($date){
	$date = date("F j, Y, g:i a",strtotime($date));
	return $date;	
}

/*
* URL FORMAT
*/
function urlFormat($str){
	//Stripping out whitesspace
	$str = preg_replace('/\s*/', '', $str);
	//Convert the srting to all lowercase
	$str = strtolower($str);
	//URL Encode
	$str = urlencode($str);
	return $str;
}

/**
 * Add classname active if category i active 
 */
function is_active($category){
	if(isset($_GET['category'])) {
		if($_GET['category'] == $category) {
			return 'active';
		}else {
			return ' ';
		}
	}
	else{
			if($category == null){
				return 'active';
			}
		}
}