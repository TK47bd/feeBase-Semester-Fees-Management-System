<!-- 
    Document   : feeBase: all cost
    Created on : Jan 4, 2020, 3:30:23 AM
    Author     : TK47bd @byteRhythms tech.
-->

<?php
session_start();
$ses = (String)$_SESSION['SesUsR'];
$seSsion = (String)$_SESSION['SEssioN'];
?>

<?php if(($seSsion)==false){header("location:loggedOut.php");}?>  


<!doctype html>
<html lang="en" oncontextmenu="return false">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="../CSS/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/main.css" rel="stylesheet" type="text/css">
    <link href="../CSS/signin.css" rel="stylesheet">
	<link rel="icon" href="../imgs/logo.png" sizes="50x50" />

    <title>feeBase: Search and Calculate</title>
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
            <br><br>
        </div>
		
		<form name="CAC" method="post" action="">
		
        <div class="row">
            <div class="col-md-4">
                <div class="jumbotron" style="margin-top: 10px;">
                    <h5>Select the desired semester:</h5>
                    <div class="form-group col-md-6">
					
                        <select id="inputState" name="SemesterList" class="form-control">
                            <option selected="">1</option>
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
                    <br>
					
                    <h5>Select waiver(%):</h5>
                    <div class="form-group col-md-6">
                        <label>[0 for none]</label>
                        <select id="inputState" name="WaverList" class="form-control">
                            <option selected="">0</option>
                            <option>10</option>
							<option>20</option>
                            <option>30</option>
							<option>40</option>
                            <option>50</option>
                            <option>80</option>
                        </select>
                        <br>
																	
                        
						<input type="submit" name="Calculate" class="btn btn-info" value="View">
						
						</form>
						
						<input type="button" name="Back" OnClick="location.href='next.php';" class="btn btn-info" style="background:#0062cc;" value="Back">
	
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <div class="jumbotron">
                    <h5>Actual cost of the semester:</h5>
                    <div class="table-responsive-sm">
                        <table class="table table-danger">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Reg</th>
                                    <th scope="col">Mid</th>
                                    <th scope="col">Final</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
													
                            <tbody>
							
							
<?php

if(isset($_POST['Calculate'])){ 

 try{
           
		   $uID = (string)$_SESSION['SesID'];
		   $SemNo = (string)$_POST['SemesterList'];
		   $WaVe = (int)$_POST['WaverList'];
		   
		   include 'conMySQLi.php';
		   $conN = OpenConN_GetCost();
		   $querY = sprintf("select * from a%s where Sem_no= %s",$uID,$SemNo);

		   $RSLT = mysqli_query($conN,$querY);

           
if($dat = mysqli_fetch_assoc($RSLT)){ 

$reg = $dat["Reg"];
$mid = $dat["Mid"];
$fin = $dat["Final"];
$a = (int)$reg;
$b = (int)$mid;
$c = (int)$fin;

$total = $a + $b + $c;
 
$waved_b = $b - ($b * $WaVe)/100;
$waved_c = $c - ($c * $WaVe)/100;

$total_waved = $a + $waved_b + $waved_c;

?>
							
							
                                <tr>
                                    <td> <?php echo $reg; ?> </td>
                                    <td> <?php echo $mid; ?> </td>
                                    <td> <?php echo $fin; ?> </td>
                                    <td> <?php echo $total; ?> </td>
                                </tr>
								
								

                        </table>
                    </div>
                    <br>
                    <h5>Cost you have to pay:</h5>

                    <div class="table-responsive-sm">
                        <table class="table table-success">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Reg</th>
                                    <th scope="col">Mid</th>
                                    <th scope="col">Final</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
							
                            <tbody>
							
							
							
                                <tr>
                                    <td> <?php echo $reg; ?> </td>
                                    <td> <?php echo $waved_b; ?> </td>
                                    <td> <?php echo $waved_c; ?> </td>
                                    <td> <?php echo $total_waved; ?> </td>
                                </tr>
                                
								
<?php }
       else{
               echo "<script> alert('Sorry, Something went Wrong!!');location='next.php';</script>";
           }
       
       }catch(Exception $it){
           
       } 
	   
	   CloseConN($conN);
	   
}else{ ?>



                                <tr>
                                    <td> 0 </td>
                                    <td> 0 </td>
                                    <td> 0 </td>
                                    <td> 0 </td>
                                </tr>
								
								

                        </table>
                    </div>
                    <br>
                    <h5>Cost you have to pay:</h5>

                    <div class="table-responsive-sm">
                        <table class="table table-success">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Reg</th>
                                    <th scope="col">Mid</th>
                                    <th scope="col">Final</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
							
                            <tbody>
							
							
							
                                <tr>
                                    <td> 0 </td>
                                    <td> 0 </td>
                                    <td> 0 </td>
                                    <td> 0 </td>
                                </tr>
                                

<?php 
	   
	CloseConN($conN);
 }
	   
 ?>								

                        </table>  
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
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