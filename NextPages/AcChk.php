<!-- 
    Document   : feeBase
    Created on : Jan 4, 2020, 3:30:23 AM
    Author     : TK47bd @byteRhythms tech.
-->


<?php 


       include 'conMySQLi.php';
	   
	   $uID = $_POST['Student_ID'];
       $uPass = sha1($_POST['PassWd']);
	   
	   
	   $conN = OpenConN_Usr();
	   
	   if(isset($_POST['Login'])){
		   
		   $qRY = "select * from Userinf where ID='".$uID."' and Pass='".$uPass."'";
           $RSLT=mysqli_query($conN,$qRY);
 
            if($dat = mysqli_fetch_assoc($RSLT))
            {
				session_start();
				$_SESSION['SEssioN']=$uID.rand();
                $_SESSION['SesID']=$uID;
				$_SESSION['SesUsR']=$dat['Name'];
				$_SESSION['Prev']=$dat['Role'];
				$_SESSION['isActive']=$dat['isActive'];
				
				if($dat['Role']=='Admin'){
				CloseConN($conN);
                header("location:ControlBoard.php"); 
				}else{
				CloseConN($conN);
                header("location:next.php");
				}
            }
            else
            { 
		        CloseConN($conN);
                echo "<script> alert('Wrong ID and Password!!'); location='../index.html'; </script>";
            }
		   
		   
	   }elseif(isset($_POST['Reg'])){
		   
		   CloseConN($conN);
		   header("location:CreateAcc.php");
	   }  	   

?>