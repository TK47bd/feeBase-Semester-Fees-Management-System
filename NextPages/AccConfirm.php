<?php

$id = $_GET['uid'];
$hash = $_GET['andHash'];

if(($id=='0')&&($hash=='0')){ ?>
	
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <title> Confirm your account: </title>
</head>

<body>

     <div>
	     <p style="font-weight:bold;"> Your account is not activated yet! please check your inbox and click the link!(go <a href="#" onClick="location.href='../index.html';">Back</a>).<br/>If you haven't recieved any mail yet, check spam box and if you think you have provided wrong email, <a href="#" onClick="location.href='../index.html';">contact us</a>. </p>
	     <?php session_start(); session_destroy(); ?>
	 </div>
	 

</body>


     <style>
         
         body{

             animation-name: aniMation;
             animation-duration: 5s;
             animation-iteration-count: infinite;    

        }  
        

         @keyframes aniMation {
             0%     {background-color: #b6f5fc;}
             50%    {background-color: #ff6666;}
             100%    {background-color: #b6f5fc;}
        }
         
     </style>


</html>	

	
<?php }else{

   try{
       $id = $_GET['uid'];
       $hash = $_GET['andHash'];
       include 'conMySQLi.php';
	   $conN = OpenConN_Usr();
	   $SqL = "UPDATE Userinf SET isActive = 'yes' where ID = '$id' and Hashes = '$hash'";
	   
	   if(mysqli_query($conN,$SqL)){
			   
			   CloseConN($conN);
			   echo "<script>alert('Account verified, now you can login!');</script>";
			   header("location:loggedOut.php");
			   
	   }else{
		   echo "Unknown Error!! ".$id." ".$hash;
	   }
	   
   }catch(Exception $r){
   
   }
}

?> 