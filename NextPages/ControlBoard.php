<!-- 
    Document   : feeBase: all cost
    Created on : Jan 4, 2020, 3:30:23 AM
    Author     : @byteRhythms tech.
-->

<?php
include 'conMySQLi.php';
session_start();
$ses = (String)$_SESSION['SesUsR'];
$seSsion = (String)$_SESSION['SEssioN'];
?>

<?php if((($seSsion)==false)||($_SESSION['Prev']!='Admin')){ ?>
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

    <title>feeBase: Admin Panel</title>
</head>

<body data-spy="scroll" data-target="#myScrollspy" data-offset="1">
    <div class="container-fluid">

        <div class="jumbotron">
            <h3>feeBase: Maintain Panel</h3> <br/>

            <div class="row">
                <nav class="col-sm-3 col-4" id="myScrollspy">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#section1">Add a Database</a>
                            <a class="nav-link" href="loggedOut.php">Log Out</a>
							<a class="nav-link" href="#section2">Update Database</a>
							<a class="nav-link" href="#section3">Remove Database</a>
							<a class="nav-link" href="#section4">Add Initial</a>
							<a class="nav-link" href="next.php">Dashboard</a>
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
				
				
				<form name="DatabaseCreate" method="post" autocomplete="off" >
						
                        <div id="section1" style="margin-left: 35px; margin-top: 165px;">	                      						
					
					    <h3 style="color:gray;"> New Cost: </h3>
						
						
						<h6 style="display:inline;"> Batch: </h6>
                            <input type="Batch" name="Batch" style="width: 70px;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>

                        <h6 style="display:inline; margin-left: 5px;"> Dept. : </h6>
                            <select name="Dept" required>
                               <option>CSE</option>
                               <option>SWE</option>
                               <option>SWECS</option>
                            </select>	
							
						<br/><br/>
											    
					    <h6>1st :</h6>
                        <div class="col form-group">
                            <input type="text" class="" style="width: 110px;" name="Reg1" placeholder="Reg" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Mid1" placeholder="Mid" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Final1" placeholder="Final" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
						
						<h6>2nd :</h6>
                        <div class="col form-group">
                            <input type="text" class="" style="width: 110px;" name="Reg2" placeholder="Reg" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Mid2" placeholder="Mid" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Final2" placeholder="Final" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
						
						<h6>3rd :</h6>
                        <div class="col form-group">
                            <input type="text" class="" style="width: 110px;" name="Reg3" placeholder="Reg" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Mid3" placeholder="Mid" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Final3" placeholder="Final" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
						
						<h6>4th :</h6>
                        <div class="col form-group">
                            <input type="text" class="" style="width: 110px;" name="Reg4" placeholder="Reg" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Mid4" placeholder="Mid" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Final4" placeholder="Final" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
						
						<h6>5th :</h6>
                        <div class="col form-group">
                            <input type="text" class="" style="width: 110px;" name="Reg5" placeholder="Reg" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Mid5" placeholder="Mid" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Final5" placeholder="Final" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
						
						<h6>6th :</h6>
                        <div class="col form-group">
                            <input type="text" class="" style="width: 110px;" name="Reg6" placeholder="Reg" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Mid6" placeholder="Mid" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Final6" placeholder="Final" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
						
						<h6>7th :</h6>
                        <div class="col form-group">
                            <input type="text" class="" style="width: 110px;" name="Reg7" placeholder="Reg" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Mid7" placeholder="Mid" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Final7" placeholder="Final" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
						
						<h6>8th :</h6>
                        <div class="col form-group">
                            <input type="text" class="" style="width: 110px;" name="Reg8" placeholder="Reg" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Mid8" placeholder="Mid" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Final8" placeholder="Final" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
						
						<h6>9th :</h6>
                        <div class="col form-group">
                            <input type="text" class="" style="width: 110px;" name="Reg9" placeholder="Reg" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Mid9" placeholder="Mid" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Final9" placeholder="Final" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
						
						<h6>10th :</h6>
                        <div class="col form-group">
                            <input type="text" class="" style="width: 110px;" name="Reg10" placeholder="Reg" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Mid10" placeholder="Mid" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Final10" placeholder="Final" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
						
						<h6>11th :</h6>
                        <div class="col form-group">
                            <input type="text" class="" style="width: 110px;" name="Reg11" placeholder="Reg" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Mid11" placeholder="Mid" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Final11" placeholder="Final" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
						
						<h6>12th :</h6>
                        <div class="col form-group">
                            <input type="text" class="" style="width: 110px;" name="Reg12" placeholder="Reg" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Mid12" placeholder="Mid" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							<input type="text" class="" style="width: 110px;" name="Final12" placeholder="Final" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>

						<div>
                                <input type="submit" name="ADD_DB" class="btn-primary" value="Add">
                        </div>

                        </div>
						
                </form>	
				
				
				<?php 
						    
							 if(isset($_POST['ADD_DB'])){	
							 
							     $Batch = (string)$_POST['Batch'];
								 $Dept = (string)$_POST['Dept'];
							 
							     $conN = OpenConN_GuestCost();
								 $sql = sprintf("SELECT * FROM %s_%s",$Dept,$Batch);
								 
								 if(mysqli_query($conN,$sql)){
									 echo "<script> alert('Already Exist!!'); </script>";
									 CloseConN($conN);
								 }else{
									 
									   try{
										   
										   $conN = OpenConN_GuestCost();
										   
										   $regs = array($_POST['Reg1'],$_POST['Reg2'],$_POST['Reg3'],$_POST['Reg4'],$_POST['Reg5'],$_POST['Reg6'],$_POST['Reg7'],$_POST['Reg8'],$_POST['Reg9'],$_POST['Reg10'],$_POST['Reg11'],$_POST['Reg12']);
										   $mids = array($_POST['Mid1'],$_POST['Mid2'],$_POST['Mid3'],$_POST['Mid4'],$_POST['Mid5'],$_POST['Mid6'],$_POST['Mid7'],$_POST['Mid8'],$_POST['Mid9'],$_POST['Mid10'],$_POST['Mid11'],$_POST['Mid12']);
										   $finals = array($_POST['Final1'],$_POST['Final2'],$_POST['Final3'],$_POST['Final4'],$_POST['Final5'],$_POST['Final6'],$_POST['Final7'],$_POST['Final8'],$_POST['Final9'],$_POST['Final10'],$_POST['Final11'],$_POST['Final12']);
										   $totals = array(($_POST['Reg1']+$_POST['Mid1']+$_POST['Final1']),($_POST['Reg2']+$_POST['Mid2']+$_POST['Final2']),($_POST['Reg3']+$_POST['Mid3']+$_POST['Final3']),($_POST['Reg4']+$_POST['Mid4']+$_POST['Final4']),($_POST['Reg5']+$_POST['Mid5']+$_POST['Final5']),($_POST['Reg6']+$_POST['Mid6']+$_POST['Final6']),($_POST['Reg7']+$_POST['Mid7']+$_POST['Final7']),($_POST['Reg8']+$_POST['Mid8']+$_POST['Final8']),($_POST['Reg9']+$_POST['Mid9']+$_POST['Final9']),($_POST['Reg10']+$_POST['Mid10']+$_POST['Final10']),($_POST['Reg11']+$_POST['Mid11']+$_POST['Final11']),($_POST['Reg12']+$_POST['Mid12']+$_POST['Final12']));
										   
								           $sql = sprintf("CREATE TABLE byterhyt_semfees.%s_%s(Sem_no int(2) NOT NULL, Reg int(6) NOT NULL, Mid int(6) NOT NULL, Final int(6) NOT NULL, Total int(8) NOT NULL, PRIMARY KEY (Sem_no))",$Dept,$Batch);
										   mysqli_query($conN,$sql);
										   
										   $j = 0;
										   for($i=0;$i<12;$i++){
											$j++;   
										   $ins = sprintf("INSERT INTO byterhyt_semfees.%s_%s (Sem_no, Reg, Mid, Final, Total) VALUES ('$j', '$regs[$i]', '$mids[$i]', '$finals[$i]', '$totals[$i]')",$Dept,$Batch);
										   mysqli_query($conN,$ins);
										   }
										   echo "<script> alert('Database Created!!'); </script>";
										   CloseConN($conN); 
										   
										   $SQL = "INSERT INTO byterhyt_semfees.Programs (Dept, Batch) VALUES('$Dept','$Batch')";
										   
										   $conNN = OpenConN_GuestCost();
										   mysqli_query($conNN,$SQL);
										   
									   }catch(Exception $e){
										   
									   }
									 
								 }
							 
							 }
							 
				?>
				
				
				
				
				<br/><br/><br/><br/><br/>
				
				
                <div class="col-sm-9 col-8" style="margin-top: 125px;">
                    <div id="section2">
                        <h1>Update a semester cost</h1>
                        <br/>                                            		
							
					   <form name="UpdateCost" method="post" autocomplete="off">
					   
					        <h6 style="display:inline;"> Batch: </h6>
                            <select name="Batch" required>
                               <option>181</option>
                               <option>191</option>
                            </select>

                            <h6 style="display:inline; margin-left: 5px;"> Dept. : </h6>
                            <select name="Dept" required>
                               <option>CSE</option>
                               <option>SWE</option>
                               <option>SWECS</option>
                            </select>
							
							<br/><br/> 
					   
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
								 
								 $SemNo = (string)$_POST['inputState'];
								 $Batch = (string)$_POST['Batch'];
								 $Dept = (string)$_POST['Dept'];
								 $Mid = $_POST['MidUp'];
								 $Fin = $_POST['FinUp'];
								 
								 if($SemNo=='1'){
									 $reg = 35100;
								 }else{
									$reg = 13500;
								 }
								 
								 $total = $Mid + $Fin + $reg; 
		   								 
								 $conN = OpenConN_GuestCost();
								 $querY = sprintf("UPDATE byterhyt_semfees.%s_%s SET Mid = '".$Mid."', Final = '".$Fin."', Total = '$total' where Sem_no = %s",$Dept,$Batch,$SemNo);

								 if(mysqli_query($conN,$querY)){
									 echo "<script> alert('Semester Cost Updated!!'); </script>";
									 CloseConN($conN);
								 }
								 
							 }
						
						
						?>
						
						
						<br/><br/><br/><br/><br/>			
						
						
					<form name="DatabaseDelete" method="post" autocomplete="off" >
					  <fieldset style="border: 1px solid black; padding: 25px;">
						
                        <div id="section3">	                      						
					
					    <h3 style="color:gray;"> Delete The Database: </h3>
						    <h5>[Can't undo once done!!]</h5>
							<br/><br/>
						
						<h6 style="display:inline;"> Batch: </h6>
                            <input type="Batch" name="Batch" style="width: 70px;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>

                        <h6 style="display:inline; margin-left: 5px;"> Dept. : </h6>
                            <select name="Dept" required>
                               <option>CSE</option>
                               <option>SWE</option>
                               <option>SWECS</option>
                            </select>	
							
						<br/><br/><br/>
						
						<div>
                                <input type="submit" name="Delete_DB" class="btn-primary" style="background:red; color:white;" value="Delete">
                        </div>

                        </div>
						
					  </fieldset>	
                    </form>	
					
					
					<?php 
					
					    if(isset($_POST['Delete_DB'])){
							
							     $Batch = (string)$_POST['Batch'];
								 $Dept = (string)$_POST['Dept'];
							
							     $conN = OpenConN_GuestCost();
								 $querY = sprintf("DROP TABLE byterhyt_semfees.%s_%s",$Dept,$Batch);

								 if(mysqli_query($conN,$querY)){
									 echo "<script> alert('Database Removed!!'); </script>";
									 
									 CloseConN($conN);
									 
									 $conN = OpenConN_GetCost();
									 
									 $Sql = "DELETE FROM Programs WHERE Batch = '$Batch' and Dept = '$Dept'";
									 
									 mysqli_query($conN,$Sql);
									 
									 CloseConN($conN);
								 }else{
									 echo "<script> alert('Database Not Found!!'); </script>";
									 CloseConN($conN);
								 }
							
						}
					
					?>
					
						
						

						<br/><br/><br/><br/><br/>		
						
						<form name="InitialUpdate" method="post" autocomplete="off">
						
                        <div id="section4">
                            <h1>Add a Teacher Initial in feeBase:</h1>
                            <br>
                            <h5>Initial:</h5>
                            <div class="col form-group">
                                <input type="text" name="Initial" class="form-control form-control-lg" placeholder="Initial" required>
                            </div>
                            <h5>Teacher's Name:</h5>
                            <div class="col form-group">
                                <input type="text" name="Name" class="form-control form-control-lg" placeholder="Full Name" required>
                            </div>
                            <h5>Profile Link:</h5>
                            <div class="col form-group">
                                <input type="text" name="Link" class="form-control form-control-lg" placeholder="Link" required>
                            </div>
                            <div>
                                <input type="submit" name="ADD" class="btn btn-lg btn-primary" value="Add Initial">
                            </div>
							
						</form>
						
						
						<?php 
					
					    if(isset($_POST['ADD'])){
													
							$Init = (string)$_POST['Initial'];
							$NAME = (string)$_POST['Name'];
							$Link = (string)$_POST['Link'];
							
							$conN = OpenConN_teacR();
							
							$qRY = "INSERT INTO teach_init (Initial, Name, Link) VALUES('$Init', '$NAME', '$Link')";
			                if(mysqli_query($conN,$qRY)){
								echo "<script> alert('Initial inserted!!'); </script>";
								CloseConN($conN);
							}else{
							    echo "<script> alert('Data exist or unknown error!!'); </script>";
								CloseConN($conN);
							}
							
						}
						
						?>
						
						
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