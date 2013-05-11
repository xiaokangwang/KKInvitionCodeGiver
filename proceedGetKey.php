<?php
/*
KeyGet  -- a tool to give key to user.
Copyright @ XiaokangWang. All rights reserved.

==========================================================

In this file we will respon to AJAX request from browser.

==========================================================
*/

//ensure the read line will be successful.
ini_set('auto_detect_line_endings',true);


//Get the line from a file.
function gettheline($fileName,$linenumber) {
//check input arg
	if($filename==""&&$linenumber<0){

		echo("Sorry,We have run into a technical problem.Please report these information to the webmaster.CODE:INVALID_ARG");
		debug_print_backtrace();

		return "INVALID_ARG";
	}

//Now we proceed.
    if(file_exists($fileName)) { //check if file exist
        $file = fopen($fileName,'r');

        $count=0; 

        while(1) { 
            
            if(feof($file)){

            	fclose($file);

            	return "RUN_OUT_OF_KEYS";

            }


            $onekey = fgets($file);


            if($count==$linenumber){

            fclose($file); 

            return $onekey;

        	}

            $count++;
            
        }
        
    } else {

    	echo("Sorry,We have run into a technical problem.Please report these information to the webmaster.CODE:NO_SUCH_FILE");
		debug_print_backtrace();

        return "NO_SUCH_FILE";
    }       
}

//read count file and add 1 to count.
function nextcounting(){

	$countfile="KKDEV_OBTING_COUNT";//config:file to record how many keys used.

	if (file_exists($countfile)){

		$file = fopen($countfile, "r");
    	$counts = fgets($file);
     	fclose($file);


      	$file = fopen($countfile, "w");
      	fputs($file, intval($counts) + 1);
      	fclose($file);

      	return $counts;

	}
	else{

		$file = fopen($countfile, "w");
      	fputs($file, "1");
      	fclose($file);


      	return 0;

	}



}

function readkey(){

	$keyfilelocation="keys.txt"; //config:file to where keys located line by line.

	$keycounting = intval(nextcounting());

	$thekey=gettheline($keyfilelocation,$keycounting);

	return $thekey;
	

}

function showkey($key){

	if("RUN_OUT_OF_KEYS"==$key){
		echo("No key remaining.");//translate:notice user we have nolonger have key to give them and all key had already used.
	}
    
    echo $key;

}

function challenge_user(){

	$challengekey="9KBe6MjXudW5EC4vsp364141yn03mC51";//config:key to verify user was logined once and is a part of us.

	if ($challengekey==$_POST["userchallenge"]) {
		
		return 0;

	}else
	{
		return 1;
	}

}

header('Access-Control-Allow-Origin: *');  //prevent from browser error:Access-Control-Allow-Origin

if(!challenge_user())
{
	showkey(readkey());
}else{
	echo("incorrect auth");
}
?>