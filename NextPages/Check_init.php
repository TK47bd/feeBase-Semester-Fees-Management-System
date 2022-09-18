<!-- 
    Document   : feeBase
    Created on : Jan 4, 2020, 3:30:23 AM
    Author     : TK47bd @byteRhythms tech.
-->

<?php
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

    <title>feeBase: Search Initials</title>
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
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1>Initial Finder</h1>
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
					
                        <form class="form-inline" name="initF" method="post" action="" autocomplete="off">
						
                            <input class="form-control mr-sm-2" name="init" type="text" placeholder="Enter Initial">
                            <button class="btn btn-success" name="Find" onClick="return valid();" type="submit">Search</button>
							
                        </form>
                    </nav>
                    <div class="table-responsive-sm">
                        <table class="table table-dark">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Initial</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">External Link</th>
                                </tr>
                            </thead>
							
							<tbody>
							
							
							<?php
	                          
							  if(isset($_POST['Find'])){

				              try{
						
						         include 'conMySQLi.php';
							
							     $Init = (string)$_POST['init'];
							
							     $conN = OpenConN_Usr();
		   
		                         $qRY = "SELECT * FROM teach_init where Initial = '".$Init."'";
			                     $RSLT = mysqli_query($conN,$qRY);
           
                                 if($dat = mysqli_fetch_assoc($RSLT)){ ?>
								 
								        <tr>
                                         <td> <?php echo $dat['Initial']; ?> </td>
                                         <td> <?php echo $dat['Name']; ?> </td>
                                         <td> <a style="text-decoration:none" href="<?php echo $dat['Link']; ?>" target="_blank" > <?php echo $dat['Link']; ?> </a> </td>
                                        </tr>
							
							
							    <?php }else{ ?>
							        
							         <tr> <td> Not Found! </td> </tr>
							        
							     <?php }
							    
						        }catch(Exception $E){
						
						         }

                              }else{ ?>
							  
							           <tr>
                                         <td> <p>null</p> </td>
                                         <td> <p>null</p> </td>
                                         <td> <p>null</p> </td>
                                       </tr>

                           <?php }							  
				 
                            ?>                           
                                								
						    </tbody>

                        </table>
                        <button class="btn btn-dark" onCLick="location.href='../NextPages/next.php'">
                            <span class="spinner-grow spinner-grow-sm"></span>
                            Go back to feeBase
                        </button>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2020 byteRhythms tech.</p>
    </div>


    </div>




    </div>
	

                   <script type="text/javascript">
				   
				      function valid(){
                 
                     var uname=document.initF.init.value;
                    if(uname===""){
                     alert("Please Enter an initial!!");
                     document.initF.init.focus();
                     return false;
                    }
                    if((uname.length<3) ||(uname.length>4)){
                     alert("Invalid Initial format(char 3 to 4)!!!");
                     document.initF.init.focus();
                     return false;
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