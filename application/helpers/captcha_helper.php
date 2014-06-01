<?php

function recaptcha()
{
	  //grab the recaptcha page
	$page = file_get_contents('http://api.recaptcha.net/challenge?k=6LfoGtwSAAAAADYYiZSwTNcokU6_J3IWOeSBet4w');

	//split the document into lines
	$lines = explode("\n",$page);

	//find the line containing the challenge code
	foreach($lines as $line){
		if(strstr($line,"challenge : '")){
			$url = str_replace("challenge : '",null,$line);
			$url = str_replace("',",null,$url);
			$url = trim($url);
			break;
		}
	}

	return $url;
}
?> 