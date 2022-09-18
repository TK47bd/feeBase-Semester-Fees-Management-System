<!doctype html>
<html lang="en" oncontextmenu="return false">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
	<meta property="og:image" content="imgs/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="../imgs/logo.png" sizes="50x50" />
    <link href="../CSS/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/main.css" rel="stylesheet" type="text/css">
    <link href="../CSS/signin.css" rel="stylesheet">

    <title>feeBase: Change Password</title>
	
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
                <h6 id="link2br">Powered by <a class="a" href="https://byterhythms.com">byterhythms</a> </h6>
            </div>
        </div>

        <div class="formm">
            <form name="UpData" class="form-signin" method="POST" action="" autocomplete="off">
                <h1 class="h4 mb-3 font-weight-normal">Create a new password for your feeBase account</h1>
                <label for="inputNewPass" class="sr-only">NewPass</label>
                <input type="password" name="NewPass" id="inputNewPass" class="form-control" placeholder="New Password" onkeyup='check_pass();' required autofocus>
                <label for="confirmPassword" class="sr-only">ConfirmPass</label>
                <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm new password"
                    onkeyup='check_pass();' required>

                <input name="Change" id="Submit" onClick="return valid();" class="btn btn-danger btn-block" type="submit" value="Change password">
                
                <br/>
				<a href="https://www.feebase.byterhythms.com/">Go to login panel </a>


                <p id="footer" class="mt-5 mb-3 text-muted">&copy; 2020 byteRhythms tech. All rights reserved.</p>
            </form>


        </div>



    </div>
    
    
    <?php
	   
	         if(isset($_POST['Change'])){
				 
				 include 'conMySQLi.php';
				 try{
					 
					 $Hash = $_GET['Veri'];
					 $newHash = md5(rand()) ;
					 $newPass = sha1($_POST['NewPass']);
					 $conN = OpenConN_Usr();
					 
					 $SqL = "SELECT Hashes FROM Userinf where Hashes = '$Hash'";
					 
					 $RSLT = mysqli_query($conN,$SqL);
					 
						 if(mysqli_fetch_assoc($RSLT)){
						     
						     $SqL1 = "UPDATE Userinf SET Pass = '$newPass' where Hashes = '$Hash'";
						     
						     $RSLT = mysqli_query($conN,$SqL1);
						     
						     $SqL2 = "UPDATE Userinf SET Hashes = '$newHash' where Hashes = '$Hash'";
						     if(mysqli_query($conN,$SqL2)){
						         echo "<script> alert('Your new password is set now!!'); location.href='../index.html';</script>";
						     }else{
						     echo "<script> alert('Bad Request, can not proceed!!');</script>";
						     }
						 }else{
						     echo "<script> alert('Invalid Request!!');</script>";
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
        
        
        <script type="text/javascript">
        
             function valid(){
                 
                 var upass=document.UpData.NewPass.value;
                 if(upass===""){
                     alert("Please Enter Password!!");
                     document.UpData.NewPass.focus();
                     return false;
                 }
                 if((upass.length<5) ||(upass.length>15)){
                     alert("Invalid password format(char 5 to 15)!!!");
                     document.UpData.NewPass.focus();
                     return false;
                 }
                 
                 
                }
    
        </script>
        
        
        
        <script>
            
                function check_pass() {
                   if (document.getElementById('inputNewPass').value ==
                          document.getElementById('confirmPassword').value) {
                             document.getElementById('Submit').disabled = false;
                   } else {
                          document.getElementById('Submit').disabled = true;
                 }
               }
            
       </script>
	
	
</body>

</html>