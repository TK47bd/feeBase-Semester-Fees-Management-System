<!-- 
    Document   : feeBase
    Created on : Jan 4, 2020, 3:30:23 AM
    Author     : TK47bd @byteRhythms tech.
-->


<?php

    function OpenConN_Usr(){
    define('MyHost1','localhost');
	define('MyUser1','root');
    define('MyPass1','');
    define('MyDB1','byterhyt_feebasedb');
	
	$dB1 = mysqli_connect(MyHost1,MyUser1,MyPass1,MyDB1);
	
	if(!$dB1){
	    die("Database not set!!");
	}
	
	return $dB1 ;
}



	function OpenConN_GuestCost(){
    define('MyHost2','localhost');
	define('MyUser2','byterhyt_feeB');
    define('MyPass2','feeBASE47');
    define('MyDB2','byterhyt_semfees');
	
	$dB2 = mysqli_connect(MyHost2,MyUser2,MyPass2,MyDB2);
	
	if(!$dB2){
	    die("Database not set!!");
	}
	
	return $dB2 ;
}
	
	
	function OpenConN_GetCost(){
    define('MyHost3','localhost');
	define('MyUser3','byterhyt_feeB');
    define('MyPass3','feeBASE47');
    define('MyDB3','byterhyt_semfees');
	
	$dB3 = mysqli_connect(MyHost3,MyUser3,MyPass3,MyDB3);
	
	if(!$dB3){
	    die("Database not set!!");
	}
	
	return $dB3 ;
}
	
	
	function OpenConN_teacR(){
    define('MyHost4','localhost');
	define('MyUser4','byterhyt_feeB');
    define('MyPass4','feeBASE47');
    define('MyDB4','byterhyt_feebasedb');
	
	$dB4 = mysqli_connect(MyHost4,MyUser4,MyPass4,MyDB4);
	
	if(!$dB4){
	    die("Database not set!!");
	}
	
	return $dB4 ;
}


	

    function CloseConN($dB)
    {
      $dB -> close();
    }	   
	   

?>