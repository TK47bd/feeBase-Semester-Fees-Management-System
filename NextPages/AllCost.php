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


    <title>feeBase: Semester wise fees</title>
	
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
                <a href="next.php" class="btn goback btn btn-secondary active" role="button" aria-pressed="true">Go
                    back</a>

            </div>

        </div>
        <div class="jumbotron">

            <p class="fonted-fee">Semester wise fees:</p>
            <table class="table table-striped table-success table-lg">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Semester</th>
                        <th scope="col">L/T</th>
                        <th scope="col">Reg</th>
                        <th scope="col">Mid</th>
                        <th scope="col">Final</th>
                        <th scope="col">Costs</th>
                    </tr>
                </thead>
				
				
<?php

try
{
    $total_cost = 0;
    $sem_tot    = 0;
    $reg_tot    = 0;
    $mid_tot    = 0;
    $fin_tot    = 0;
    $total_tot  = 0;
	
	$L = 1;
    $T = 1;
	
	include 'conMySQLi.php';
    $conN = OpenConN_GetCost();
	
	$uID = (string)$_SESSION['SesID'];
     
    $querY = sprintf("select * from a%s",$uID);
	$RSLT = mysqli_query($conN,$querY);

while($dat = mysqli_fetch_assoc($RSLT)){
	
$s = (int)$dat["Sem_no"];    
$a = (int)$dat["Reg"];
$b = (int)$dat["Mid"];
$c = (int)$dat["Final"];

$sem_tot = $s;
$reg_tot = $reg_tot + $a;
$mid_tot = $mid_tot + $b;
$fin_tot = $fin_tot + $c;

$total_cost = $a + $b + $c;

$total_tot = $total_tot + $total_cost;


?>	
				
				
                <tbody>
				
                    <tr>
                        <th scope="row"> <?php echo $dat["Sem_no"]; ?> </th>
                        <td> <?php echo "L-".$L."/T-".$T++; ?> </td>
                        <td> <?php echo $dat["Reg"]; ?> </td>
                        <td> <?php echo $dat["Mid"]; ?> </td>
                        <td> <?php echo $dat["Final"];?> </td>
                        <td> <?php echo $total_cost; ?> </td>
                    </tr>
<?php
         
		 if($T==4){ $T = 1; $L++;}
}
?>					
					
					<tr class="bg-success">
                        <th scope="row">Total</th>
                        <td> <?php echo $sem_tot; ?> </td>
                        <td> <?php echo $reg_tot; ?> </td>
                        <td> <?php echo $mid_tot; ?> </td>
                        <td> <?php echo $fin_tot; ?> </td>
                        <td> <?php echo $total_tot; ?> </td>
                    </tr>
					

                </tbody>
            </table>
			
 <?php
CloseConN($conN);
    }catch(Exception $e){
    echo "Unknown Error";
    }

?>			

        </div>

        <div class="footer">
            <p>&copy; 2020 byteRhythms tech.</p>
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