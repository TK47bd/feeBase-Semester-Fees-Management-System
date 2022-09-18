<!-- 
    Document   : feeBase: Guest View
    Created on : Jan 4, 2020, 3:30:23 AM
    Author     : TK47bd
-->

<?php

include 'conMySQLi.php';
$conN = OpenConN_GuestCost();

?>

<!DOCTYPE html>
<html oncontextmenu="return false" xmlns:h="http://java.sun.com/jsf/html" xmlns:f="http://java.sun.com/jsf/core">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>Welcome to feeBase</title>
        
        <link rel="stylesheet" href="../CSS/AllFee.css" />
        <link rel="stylesheet" href="../CSS/public_q.css" />
        <link rel="icon" href="../imgs/logo.png" sizes="50x50" />
        
    </head>

<body>
    
        
<form name="checkCosts" action="Public_Query.php" method="POST"> 

<br/>    
<center> <label><b> Select course: </b></label> </center> <br/>
<center> <select name="CourseSee" id="CourseSee">
           
    <?php 
	   
	    $sql = "SELECT DISTINCT(Dept) FROM Programs";
	   
	    $Rslt = mysqli_query($conN,$sql);
								 
			while($dat=mysqli_fetch_assoc($Rslt)){ ?>	  	   

                 <option> <?php echo $dat['Dept']; ?> </option>   
    <?php   } ?>	 
        
         </select> </center> <br/>

<center> <input type="submit" value="View" name="deptSubmit" /> </center>
</form>
        
<br/>       

<?php if(isset($_POST['deptSubmit'])){ $batC  = "181"; ?> 

<div class="form_container" align="center">        

<table class="table">
<caption> Semester Wise Fees:[<?php echo $_POST["CourseSee"].":".$batC; ?>]</caption>
<thead>
<tr>
        <th align="center">No.</th>
        <th align="center">Reg.</th>
        <th align="center">Mid</th>
        <th align="center">Final</th>
        <th align="center">Total</th>
</tr>
</thead>

<?php

$StrID = $_POST["CourseSee"];

try
{
 
    $total_cost = 0;
    $sem_tot    = 0;
    $reg_tot    = 0;
    $mid_tot    = 0;
    $fin_tot    = 0;
    $total_tot  = 0;
	
	$L = 1;
    $T = 0;
     

$querY = sprintf("select * from %s_%s",$StrID,$batC);

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
    <tr>
        <td align="center"> <?php echo $dat["Sem_no"]."   ["."L-".$L.",T-".++$T."]"; ?> </td>
        <td align="center"> <?php echo $dat["Reg"]; ?> </td>
        <td align="center"> <?php echo $dat["Mid"]; ?> </td>
        <td align="center"> <?php echo $dat["Final"];?> </td>
        <td align="center"> <?php echo $total_cost; ?> </td>
    </tr>
        <?php
		
		if($T==3){ $T = 0;$L++;}
}
?>

    <tr class="tfoot_td">
        <th align="center">Total:</th>
        <th align="center">Total:</th>
        <th align="center">Total:</th>
        <th align="center">Total:</th>
        <th align="center">Total:</th>
    </tr>

    <tr class="tfoot_td">
        <th align="center"><?php echo $sem_tot; ?></th>
        <th align="center"><?php echo $reg_tot; ?></th>
        <th align="center"><?php echo $mid_tot; ?></th>
        <th align="center"><?php echo $fin_tot; ?></th>
        <th align="center"><?php echo $total_tot; ?></th>
    </tr>

    </table>
    
    
    <?php
    CloseConN($conN);
    }
catch(Exception $e){
    echo "Unknown Error";
    }

}
	?>


    
</div>  

<br/>
<center> 
        <input type="submit" name="action" OnClick="location.href='next.php';" value="Back" /> 
</center>
        
        <div class="footr_q">

                <p>&copy; byteRhythms tech. (2020)</p>

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
