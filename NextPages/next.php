<!-- 
    Document   : feeBase
    Created on : Jan 4, 2020, 3:30:23 AM
    Author     : TK47bd 
    Design     : TKBD, 4RN08 & LeoMon101 @byteRhythms tech.
-->

<?php
session_start();
$ses = (String)$_SESSION['SesUsR'];
$seSsion = (String)$_SESSION['SEssioN'];

if(($_SESSION['isActive']=='no') || ($_SESSION['isActive']!='yes')){
	header("location:AccConfirm.php?uid=0&andHash=0");
}

?>


<!doctype html>
<html lang="en" oncontextmenu="return false">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="../imgs/blueLogo.png" sizes="50x50" />
    <link href="../CSS/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/main.css" rel="stylesheet" type="text/css">
    <link href="../CSS/signin.css" rel="stylesheet">
	
	 <?php if(($seSsion)==false){header("location:loggedOut.php");}?>

    <title>feeBase: Dashboard</title>
	
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
                <h6 id="link2br">Powered by <a class="a" href="https://byterhythms.com">byterhythms</a> </h6>
            </div>
            <br><br>
        </div>
        <div class="row">
            <div class="col-md-8 text-center">		    
			
                <div class="jumbotron">
					
                    <img src="../imgs/user/avatar.png" alt="user" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                    <div class="media-body">
                        <h2>Hello <small> <?php echo $ses;?> !</small></h4>
                            <h5>This is your feeBase. Chose an option bellow: </h5>
                    </div>
                    <br><br>
                    <form class="form-group">
                        <button type="button" onClick="location.href='AllCost.php'" class="btn btn-lg btn-dark">All semester fees at a
                            glance</button>
                    </form>
                    <form class="form-group"></form>
                    <button type="button" onClick="location.href='CheckAndCount.php'" class="btn btn-lg btn-primary"> See a specific semester
                        fee</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="jumbotron">
                    <h5>More Options:</h5>
                    <br>
                    <input type="submit" onClick="location.href='Check_init.php'" value="Initial Finder »" class="btn btn-block btn-secondary "> 
                    <input type="submit" onClick="location.href='Disstudy/index.php'" value="Disstudy »" class="btn btn-block btn-secondary ">
                    
                    <?php if($_SESSION['Prev']=='Admin'){ ?>
                    
                    <input type="submit" onClick="location.href='ControlBoard.php'" value="Admin Panel »" class="btn btn-block btn-secondary ">
                    
                    <?php }else{ ?>
                    
                    <input type="submit" onClick="location.href='Profile.php'" value="Profile »" class="btn btn-block btn-secondary ">
                    
                    <?php } ?>
                    
                    <input type="submit" onClick="window.open('https://www.byterhythms.com/')" value="About Us »" class="btn btn-block btn-secondary ">
                    <input type="submit" onClick="location.href='loggedOut.php'" value="Log out" class="btn btn-block btn-danger ">
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