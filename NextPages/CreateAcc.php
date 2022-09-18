<!-- 
    Document   : feeBase: Login
    Created on : Jan 4, 2020, 3:30:23 AM
    Author     : TK47bd & 4RN08 @byteRhythms tech.
-->

<?php

  include 'conMySQLi.php';
  
?>

<!doctype html>
<html lang="en" oncontextmenu="return false">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    
	<meta property="og:image" content="../imgs/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="icon" href="../imgs/logo.png" sizes="50x50" />
    <link href="../CSS/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/main.css" rel="stylesheet" type="text/css">
    <link href="../CSS/signin.css" rel="stylesheet">

    <title>feeBase: Regester Now</title>
	
</head>

<body>
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
        <br><br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <header class="card-header">
                        <a href="https://www.feebase.byterhythms.com" class="float-right btn btn-outline-primary mt-1">Log in</a>
                        <h4 class="card-title mt-2">Sign up</h4>
                    </header>
                    <article class="card-body">
					
                        <form name="CreateData" method="post" action="CreateAcc.php" autocomplete="off">
						
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>Name</label>
                                    <input type="text" name="Name" class="form-control" placeholder="NickName">
                                </div> 
                                <div class="col form-group">
                                    <label>Student ID</label>
                                    <input type="text" name="ID" class="form-control" placeholder="ex: 10803"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div> 
                            </div> 
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="Email" class="form-control" placeholder="ex@mail.com">
                                <small class="form-text text-muted">Share real mail for verification! We'll never share your info with anyone
                                    else.</small>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Batch</label>
                                    <select id="inputState" name="Batch" class="form-control">
                                        
                                     <?php 
                                        
                                            $conNN = OpenConN_GetCost();	
	   
	                                        $sql = "SELECT DISTINCT(Batch) FROM     Programs";
	   
	                                        $Rslt = mysqli_query($conNN,$sql);
								 
			                                while($dat=mysqli_fetch_assoc($Rslt)){ ?>	  	   

                                            <option> <?php echo $dat['Batch']; ?>  </option>   
                                            
                                      <?php   } CloseConN($conNN); ?>
                                        
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Department</label>
                                    <select id="inputState" name="Dept" class="form-control">
                                        
                                        <?php 
                                        
                                            $conNN = OpenConN_GetCost();	
	   
	                                        $sql = "SELECT DISTINCT(Dept) FROM      Programs";
	   
	                                        $Rslt = mysqli_query($conNN,$sql);
								 
			                                while($dat=mysqli_fetch_assoc($Rslt)){ ?>	  	   

                                            <option> <?php echo $dat['Dept']; ?>     </option>   
                                            
                                      <?php   } CloseConN($conNN); ?>
                                        
                                    </select>
                                </div> 
                            </div> 
                            
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Varsity</label>
                                    <select id="inputState" name="Varsity" class="form-control" required>
                                        
                                        <option>DIU</option>                              
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Section</label>
                                    <select id="inputState" name="Sec" class="form-control" required>
                                        
                                        <option selected="">A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <option>D</option>
                                        <option>E</option>
                                        <option>F</option>
                                        <option>G</option>
                                        <option>H</option>
                                        <option>I</option>
                                        <option>J</option>
                                        <option>K</option>
                                        <option>L</option>
                                        <option>M</option>
                                        <option>N</option>
                                        <option>O</option>
                                        <option>P</option>
                                        <option>Q</option>
                                        
                                    </select>
                                </div> 
                            </div> 
                            
                            
                            <div class="form-group">
                                <label>Create password</label>
                                <input type="password" name="PassWord" class="form-control" placeholder="new Password">
                            </div> 
                            <input type="submit" onclick="return valid();" name="Create" class="btn btn-primary" value="Sign Up">


                            <br><br>
                            <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our
                                <br> Terms of use and Privacy Policy.</small>
                        </form>
						
                    </article> 
                    <div class="border-top card-body text-center">Have an account? <a href="https://www.feebase.byterhythms.com">Log In</a></div>
                </div>
            </div> 

        </div> 


    </div>
    



    </div>
	
	
	
	
	
	  <?php 
		
         
        if(isset($_POST["Create"])){
			
//      Create new User! 
		 
         try{
           
		   $NamE = (string)$_POST['Name'];
		   $uID = (string)$_POST['ID'];
		   $DEP = (string)$_POST['Dept'];
		   $Bat = (string)$_POST['Batch'];
		   $PasS = sha1($_POST['PassWord']);
		   $Mail = (string)$_POST['Email'];
		   $isActive = 'no';
		   $Hashes = md5(rand());
		   $SEC = (string)$_POST['Sec'];
		   $Vars = (string)$_POST['Varsity'];
		   
		   $conN = OpenConN_Usr();
		   
		   $SqL = "insert into Userinf(Name,ID,Dept,Batch,Pass,Mail,isActive,Hashes,Section,Varsity) values ('".$NamE."','".$uID."','".$DEP."','".$Bat."','".$PasS."','".$Mail."','".$isActive."','".$Hashes."','".$SEC."','".$Vars."')";

		   if(mysqli_query($conN,$SqL)){
			   
			   CloseConN($conN);

//         Create new user database!
			   
		   try{
            
		   $conNn = OpenConN_GetCost();	
           
           $uID = (string)$_POST['ID'];
           $StrSQL = sprintf("CREATE TABLE byterhyt_semfees.a%s (Sem_no int(2) NOT NULL, Reg int(6) NOT NULL, Mid int(6) NOT NULL, Final int(6) NOT NULL, Total int(8) NOT NULL, PRIMARY KEY (Sem_no))",$uID);
           
		   if(mysqli_query($conNn,$StrSQL)){
		     
			 CloseConN($conNn);
			 
//          Copy costs from main copy!

		   try{
			 
           $uID = (string)$_POST['ID'];
		   $DEP = (string)$_POST['Dept'];
		   $Bat = (string)$_POST['Batch'];
           
           $conNnn = OpenConN_GetCost();
             
           $SQL2 = sprintf("INSERT INTO byterhyt_semfees.a%s SELECT * from byterhyt_semfees.%s_%s",$uID,$DEP,$Bat);
		   
           if(mysqli_query($conNnn,$SQL2)){
			   
			   CloseConN($conNnn);  
			   
			   
			   require_once "Mailer/PHPMailerAutoload.php";


               $mail = new PHPMailer;

               $mail->From = "noreply@feebase.byterhythms.com";
               $mail->FromName = "feeBase";
               $mail->addAddress($Mail, $NamE);
               $mail->Subject = "Verify your feeBase account!";
               $mail->Body = "Click the link to confirm and activate your account: https://www.feebase.byterhythms.com/NextPages/AccConfirm.php?uid=$uID&andHash=$Hashes";
               $mail->send();

	
		       echo "<script>location='regsuccess.html';</script>"; 
		      
		   }else{	
		   
			   $conN = OpenConN_Usr();
			   $StrSQL = "DELETE FROM Userinf WHERE ID = '".$uID."'";
			   if(mysqli_query($conN,$StrSQL)){
		     
			    CloseConN($conN);
			   }
				$conNn = OpenConN_GetCost();
				$StrSQLL = sprintf("DROP TABLE a%s",$uID);
				if(mysqli_query($conNn,$StrSQLL)){
		     
			    CloseConN($conNn);
				}
		        echo "<script>alert('Error...!!!');location='CreateAcc.php';</script>";
			   
		   }


         }catch(Exception $E){
			 
               $conN = OpenConN_Usr();
			   $StrSQL = "DELETE FROM Userinf WHERE ID = '".$uID."'";
			   if(mysqli_query($conN,$StrSQL)){
		     
			    CloseConN($conN);
			   }
				$conNn = OpenConN_GetCost();
				$StrSQLL = sprintf("DROP TABLE a%s",$uID);
				if(mysqli_query($conNn,$StrSQLL)){
		     
			    CloseConN($conNn);
				}
		        echo "<script>alert('Error...!!!');location='CreateAcc.php';</script>";
		   }
			 
			 
		   }else{
			   
			   $conN = OpenConN_Usr();
			   $StrSQL = "DELETE FROM Userinf WHERE ID = '".$uID."'";
			   if(mysqli_query($conN,$StrSQL)){
		     
			    CloseConN($conN);
			   }
				$conNn = OpenConN_GetCost();
				$StrSQLL = sprintf("DROP TABLE a%s",$uID);
				if(mysqli_query($conNn,$StrSQLL)){
		     
			    CloseConN($conNn);
				}
		        echo "<script>alert('Error...!!!');location='CreateAcc.php';</script>"; 			   
		   }

          
         }catch(Exception $E){
			 
               $conN = OpenConN_Usr();
			   $StrSQL = "DELETE FROM Userinf WHERE ID = '".$uID."'";
			   if(mysqli_query($conN,$StrSQL)){
		     
			    CloseConN($conN);
			   }
				$conNn = OpenConN_GetCost();
				$StrSQLL = sprintf("DROP TABLE a%s",$uID);
				if(mysqli_query($conNn,$StrSQLL)){
		     
			    CloseConN($conNn);
				}
		        echo "<script>alert('Error...!!!');location='CreateAcc.php';</script>";
         }
		 			   
		     
		   }else{

		        echo "<script>alert('Error...!!!');location='CreateAcc.php';</script>";
		   }		   
           
            
         }catch(Exception $E){
            echo "<script>alert('Error...!! Account Exist or Database not ready yet!!');location='CreateAcc.php';</script>";  
         }
         	
		
		}
		
        
		?>   
	
	
	
	
	
	
	
	    <script type="text/javascript">
        
             function valid(){
                 
                 var uname=document.CreateData.Name.value;
                 if(uname===""){
                     alert("Please Enter a name!!");
                     document.CreateData.Name.focus();
                     return false;
                 }
                 if((uname.length<5) ||(uname.length>12)){
                     alert("Invalid Name format(char 5 to 12)!!!");
                     document.CreateData.Name.focus();
                     return false;
                 }
                 
                 
                 var uid=document.CreateData.ID.value;
                 if(uid===""){
                     alert("Please Enter an ID!!");
                     document.CreateData.ID.focus();
                     return false;
                 }
                 if((uid.length<4) ||(uid.length>6)){
                     alert("Invalid ID format(char 4 to 6)!!!");
                     document.CreateData.ID.focus();
                     return false;
                 }
                 
                 var umail=document.CreateData.Email.value;
                 if(umail===""){
                     alert("Please Enter Email!!");
                     document.CreateData.Email.focus();
                     return false;
                 }
                 if((umail.length<7) ||(umail.length>30)){
                     alert("Invalid Email format!!!");
                     document.CreateData.Email.focus();
                     return false;
                 }
                 
                 var upass=document.CreateData.PassWord.value;
                 if(upass===""){
                     alert("Please Enter Password!!");
                     document.CreateData.PassWord.focus();
                     return false;
                 }
                 if((upass.length<5) ||(upass.length>15)){
                     alert("Invalid password format(char 5 to 15)!!!");
                     document.CreateData.PassWord.focus();
                     return false;
                 }
                 
                 
             }
    
        </script>
		
	
	
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