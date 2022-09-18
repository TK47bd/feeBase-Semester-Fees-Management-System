<!doctype html>
<html lang="en" oncontextmenu="return false">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
	<meta property="og:image" content="imgs/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="../imgs/logo.png" sizes="50x50" />
    <link href="../CSS/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/main.css" rel="stylesheet" type="text/css">
    <link href="../CSS/signin.css" rel="stylesheet">

    <title>feeBase: Change Password Request</title>
	
</head>

<body class="text-center">
    <div class="container">
        <div class="row top">
            <h1 id="fBase">feeBase</h1>
            <h6 id="beta">beta</h6>
        </div>
        <br><br><br>

        <div class="row">
            <div class="bR">
                <h6 id="link2br">Powered by <a class="a" href="https://www.byterhythms.com">byterhythms</a> </h6>
            </div>
        </div>

        <div class="formm">
            <form class="form-signin" method="POST" action="#" autocomplete="off" autofocus>
                <h1 class="h4 mb-3 font-weight-normal">Enter Mail For Password Changing Request:</h1>
                <label for="inputNewPass" class="sr-only">Email:</label>
                <input type="email" name="Email" id="inputNewPass" class="form-control" placeholder="Verified Email" autofocus>
                <br/>
                <button class="btn btn-danger btn-block" name="REQ" type="submit">Send Request</button>
				
				<br/>
				<a href="https://www.feebase.byterhythms.com/">Go to login panel </a>
				
                <p id="footer" class="mt-5 mb-3 text-muted">&copy; 2020 byteRhythms tech. All rights reserved.</p>
            </form>


        </div>



    </div>
	
	
	   <?php
	   
	         if(isset($_POST['REQ'])){
				 
				 include 'conMySQLi.php';
				 try{
					 $Email = (string)$_POST['Email'];
					 $Hashes = md5(rand());
					 $conN = OpenConN_Usr();
					 
					  $SqL = "SELECT Mail,Hashes from Userinf where Mail = '$Email'";
					  $RSLT = mysqli_query($conN,$SqL);
					  
					  if(mysqli_fetch_assoc($RSLT)){
						 echo "<script> alert('Verification mail sent!');</script>";
						 
						 $SqL2 = "UPDATE Userinf SET Hashes = '$Hashes' where Mail = '$Email'";
						 mysqli_query($conN,$SqL2);
						 
						 require_once "Mailer/PHPMailerAutoload.php";


                         $mail = new PHPMailer;

                         $mail->From = "noreply@feebase.byterhythms.com";
						 $mail->FromName = "feeBase";
						 $mail->addAddress($Email);
						 $mail->Subject = "Password Change Request Verification!!";
						 $mail->Body = "Click the link to confirm and change password of your account: https://www.feebase.byterhythms.com/NextPages/SetPass.php?Veri=$Hashes";
						 $mail->send();
			   
						 
					  }else{
						 echo "<script> alert('Email not found!!');</script>";
					  }
				 
			 }catch(Exception $E){
			 
			 }
			}
	   
	   ?>


		<script language="JavaScript">
    	

		document.onkeydown = function(e) {
			if(event.keyCode == 123) {
				return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
				return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
				return false;
			}
			if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
				return false;
			}
		}


        </script>
	
	
</body>

</html>