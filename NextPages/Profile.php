<!-- 
    Document   : feeBase: all cost
    Created on : Jan 4, 2020, 3:30:23 AM
    Author     : TK47bd @byteRhythms tech.
-->

<?php
include 'conMySQLi.php';
session_start();
$ses = (String)$_SESSION['SesUsR'];
$seSsion = (String)$_SESSION['SEssioN'];
?>

<?php if(($seSsion)==false){ ?>
    <script> alert("you are not logged in!!");</script> <?php
	header("location:loggedOut.php");}
?>

<!doctype html>
<html lang="en" oncontextmenu="return false">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="../CSS/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/main.css" rel="stylesheet" type="text/css">
    <link href="../CSS/signin.css" rel="stylesheet">
	<link rel="icon" href="../imgs/logo.png" sizes="50x50" /> 

    <title>feeBase: Maintain</title>
</head>

<body data-spy="scroll" data-target="#myScrollspy" data-offset="1">
    <div class="container-fluid">

        <div class="jumbotron">
            <h3>feeBase: Maintain Panel</h3> <br/>

            <div class="row">
                <nav class="col-sm-3 col-4" id="myScrollspy">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#section1">Update a Fee</a>
                            <a class="nav-link" href="next.php">Go Back</a>
							<a class="nav-link" href="#section2">Update Profile</a>
                        </li>
                    </ul>
					
					<br/><br/><br/><br/>
					
					<?php $MidC = 0; $FinC = 0; ?>
					
					<form name="creditCost" method="post" autocomplete="off">
					
					    <h3 style="color:gray;"> Calculate Cost: </h3>
					    
					    <h6>3 hr. Credits(Core):</h6>
                        <div class="col form-group">
                            <input type="text" name="ClassCoR" class="form-control form-control-lg" style="width: 85px;" placeholder="Core" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
					   
                        <h6>3 hr. Credits(Gen.):</h6>
                        <div class="col form-group">
                            <input type="text" name="ClassGen" class="form-control form-control-lg" style="width: 85px;" placeholder="General" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
					   
                        <h6>1 hr. Credits:</h6>
                        <div class="col form-group">
                            <input type="text" name="LabCR" class="form-control form-control-lg" style="width: 85px;" placeholder="Lab" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
                        
                        <div class="col form-group">
                        <label>Waver:[0 for none]</label>
                        <select id="inputState" name="WaverList" style="width: 30%;" class="form-control">
                            <option selected="">0</option>
                            <option>10</option>
							<option>20</option>
                            <option>30</option>
							<option>40</option>
                            <option>50</option>
                            <option>80</option>
                        </select>
                        </div>
                        
						
						<div>
                            <input type="submit" name="GetCost" style="background: #5b9903; margin-left: 12px;" style="width: 55px;" class="btn btn-lg btn-primary" value="Cost">
                        </div>
						
					</form>
					
					
					<?php 
					
					     if(isset($_POST['GetCost'])){
						 
						     $Gen = (int)$_POST['ClassGen'];
						     $Maj = (int)$_POST['ClassCoR'];
							 $lab = (int)$_POST['LabCR'];
							 $wave = (int)$_POST['WaverList'];
						     
							 $cost = ($Maj*4000) + ($Gen*3200) + ($lab*5000);
							 $calc = ($cost * $wave)/100;
							 $cost = $cost - $calc;
							 
							 $MidC = $cost/2;
							 $FinC = $cost/2;
							 
						 }
					
					?>
					
					
					<br/><br/><br/>
					
					<h6>Mid:</h6>
                        <div class="col form-group">
                            <input type="text" class="form-control form-control-lg" style="width: 90px;" placeholder="<?php echo $MidC; ?>" disabled>
                        </div>
					   
                        <h6>Final:</h6>
                        <div class="col form-group">
                            <input type="text" class="form-control form-control-lg" style="width: 90px;" placeholder="<?php echo $FinC; ?>" disabled>
                        </div>
										
                </nav>
				
				
                <div class="col-sm-9 col-8">
                    <div id="section1">
                        <h1>Update a semester cost</h1>
                        <br>						
                       				   
					   <form name="UpdateCost" method="post" autocomplete="off">
					   
					   <h5>Select the semester to modify:</h5>
                        <div class="form-group col-md-6">
                            <select id="inputState" name="inputState" class="form-control" required>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                            </select>
                       
					   </div>
					   
                        <h5>Mid-term fee:</h5>
                        <div class="col form-group">
                            <input type="text" name="MidUp" class="form-control form-control-lg" placeholder="Update mid fee" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
                        <h5>Final-term fee:</h5>
                        <div class="col form-group">
                            <input type="text" name="FinUp" class="form-control form-control-lg" placeholder="Update final fee" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
                        <div>
                            <input type="submit" name="UpCost" class="btn btn-lg btn-danger" value="Update Cost">

                        </div>
						
						</form>
						
						
						<?php 
						    
							 if(isset($_POST['UpCost'])){								 
								 
								 $uID = (string)$_SESSION['SesID'];
								 $SemNo = (string)$_POST['inputState'];
								 $Mid = $_POST['MidUp'];
								 $Fin = $_POST['FinUp'];
								  if($SemNo=='1'){
									 $reg = 35100;
								 }else{
									$reg = 13500;
								 }
								 
								 $total = $Mid + $Fin + $reg; 
		   								 
								 $conN = OpenConN_GetCost();
								 $querY = sprintf("UPDATE a%s SET Mid = '".$Mid."', Final = '".$Fin."', Total = '$total' where Sem_no = %s",$uID,$SemNo);

								 if(mysqli_query($conN,$querY)){
									 echo "<script> alert('Semester Cost Updated!!'); </script>";
									 CloseConN($conN);
								 }
								 
							 }
						
						
						?>
						
						
                        <br/><br/><br/><br/><br/>		
							
							<form name="UpdateProfile" method="post" autocomplete="off">
							
							
							  <?php
							  
							     
							  
							     $conN = OpenConN_Usr();
							  
							     $uID = (string)$_SESSION['SesID'];							     								 
					 
					             $SqL = "SELECT ID,Name,Mail FROM Userinf WHERE ID = '$uID'";
					             
								 $Rslt = mysqli_query($conN,$SqL);
								 
								 if($dat=mysqli_fetch_assoc($Rslt)){
									 
									 $name = $dat['Name'];
									 $Mail = $dat['Mail'];
									 
								 }
							  
							  ?>
							
							
							<div id="section2">
                            <h1>Your profile:</h1>
                            <br>
                            <h5>ID:</h5>
                            <div class="col form-group">
                                <input type="text" class="form-control form-control-lg" placeholder="<?php echo $uID; ?>" disabled>
                            </div>
                            <h5>Your Name:</h5>
                            <div class="col form-group">
                                <input type="text" name="GetName" class="form-control form-control-lg" value="<?php echo $name; ?>">
                            </div>
                            <h5>Your Email:</h5>
                            <div class="col form-group">
                                <input type="Email" name="GetMail" class="form-control form-control-lg" value="<?php echo $Mail; ?>">
                            </div>
							<h5>New Password:</h5>
                            <div class="col form-group">
                                <input type="Password" name="GetPass" class="form-control form-control-lg" placeholder="Set New Password">
                            </div>
							<p> [Changing values and pressing update will change all data!] </p>
                            <div>
                                <input type="submit" name="UpdatePro" class="btn btn-lg btn-primary" value="Update">
								<input type="submit" name="DelPro" class="btn btn-lg btn-danger" value="Remove" <?php if($_SESSION['Prev']=='Admin'){ ?> disabled <?php } ?> >

                            </div>
							
							</form>			

                            <?php 
                                 
								 if(isset($_POST['UpdatePro'])){
									 
									 $conN = OpenConN_Usr();
							          
									 $uID = (string)$_SESSION['SesID'];	
							         $name = $_POST['GetName'];
									 $Email = $_POST['GetMail'];
									 $PassLen = strlen($_POST['GetPass']);
									 
									 if($PassLen>=6 && $PassLen<=12){
									    $Pass = sha1($_POST['GetPass']);
					                    $SqL = "UPDATE Userinf SET Name = '$name',Mail = '$Email', Pass = '$Pass' WHERE ID = '$uID'";
									 }else{
										echo "<script> alert('Password field is empty or char limit is less than 6, or greater than 12, password will not be updated!'); </script>"; 
										$SqL = "UPDATE Userinf SET Name = '$name',Mail = '$Email' WHERE ID = '$uID'"; 
									 }
					             
								 
								     if(mysqli_query($conN,$SqL)){
									    echo "<script> alert('Profile Updated!!'); </script>";
										CloseConN($conN);
										echo "<script>window.location='loggedOut.php';</script>";
								     }
								 }

                            ?>



                            <?php 
                                 
								 if(isset($_POST['DelPro'])){
									 
									 $conN = OpenConN_Usr();
							          
									 $uID = (string)$_SESSION['SesID'];	

									 $SqL = "DELETE FROM Userinf WHERE ID = '$uID'";
									 
									 if(mysqli_query($conN,$SqL)){
									     $conNn = OpenConN_GetCost();
									     $StrSQLL = sprintf("DROP TABLE a%s",$uID);
										 mysqli_query($conNn,$StrSQLL);
									    echo "<script> alert('Profile is Removed!!'); </script>";
										CloseConN($conN);
										echo "<script>window.location='loggedOut.php';</script>";
								     }
									 
								 }
								 
						    ?>
                                     									 


                        </div>
                    </div>
                </div>
            </div>
						
    <div class="footer" style="margin-top: 5%;">
          <p>&copy; 2020 byteRhythms tech.</p>
    </div>
			


        </div>


    </div>
	
	
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