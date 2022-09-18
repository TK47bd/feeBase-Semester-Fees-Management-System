<?php 
        include '../conMySQLi.php';
        session_start();
        $ses = (String)$_SESSION['SesUsR'];
        $id = $_SESSION['SesID'];
        $seSsion = (String)$_SESSION['SEssioN'];

        if(($seSsion)==false){ ?>
            <script> alert("you are not logged in!!");</script> <?php
                     header("location:../loggedOut.php");
        }


        $conN = OpenConN_Usr();
        $q = "SELECT Section,Varsity,Batch FROM Userinf WHERE ID = '$id'";
        $RSLT=mysqli_query($conN,$q);
 
        if($dt = mysqli_fetch_assoc($RSLT)){

            $V = $dt['Varsity'];
            $B = $dt['Batch'];
            $S = $dt['Section'];

        }


?>
<!-- 
    Document   : feeBase - Disstudy
    Created on : Jul 10, 2020, 1:23:27 AM
    Author     : TK47bd, LeoMon, 4RN08, SH4KILL @byteRhythms tech.
-->

<!DOCTYPE html>
<html lang="en" oncontextmenu="return false">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Disstudy - feeBase discussion center</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/dS_post.css">
    <link rel="icon" href="imgs/chat.png" sizes="50x50" />

</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #89c9b8;" >
      <a class="navbar-brand text-dark" href="#">
        <img src="imgs/chat.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        Disstudy: Discuss, study and beyond!
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../next.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../loggedOut.php" style="color: #e07a63;">Logout</a>
          </li>
        </ul>

  <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
  </form>

</div>

</nav>                                                                   
    
    <br><br><br>
    <div class="clearfix"></div>

    <div class="container mt-3">
        <div class="card float-left col-md-8">                                     
        <?php 

            $p = 'No';
            $qRY = "SELECT * FROM disstudy WHERE Varsity = '$V' AND Batch = '$B' AND Section = '$S'";
            $RSLT=mysqli_query($conN,$qRY);
            if($dat = mysqli_fetch_assoc($RSLT)){

                $Ad = $dat['Admin'];
                if($id == $Ad){
                    $p = 'Yes';
                }

                    $qRY = "SELECT * FROM discussions WHERE Varsity = '$V' AND Batch = '$B' AND Section = '$S' ORDER BY PostTime DESC";
                    $RSLT=mysqli_query($conN,$qRY);
                    while($data = mysqli_fetch_assoc($RSLT)){ ?>
                    
                    <?php $pn = $data['postNo']; ?>

                    <div class="card-body">
                        <blockquote class="card-header blockquote blockquotecust" style="background:#cef2d7;"> <?php echo $data['Title']; ?>

                        <?php if(($p == 'Yes') && ($data['Verified'] == 'No')){ ?>
                        <span class="float-right">
                            <form action="" method="post">
                                <input type="hidden" name="pId" value="<?php echo $pn; ?>">
                                &nbsp;<button type="submit" Name='Delete' class="btn btn-danger btn-sm">Remove</button>
                                  &nbsp;&nbsp;<button type="submit" Name='Verify' class="btn btn-success btn-sm">Verify</button>
                            </form>
                         </span>
                        
                        <?php } $cn = $_POST['pId'];

                            if(isset($_POST['Verify'])){
                                $str = "UPDATE discussions SET Verified = 'Yes' WHERE postNo = '$cn'"; 
                                if(mysqli_query($conN,$str)){
                                    echo "<script>location.href = 'index.php';</script>";
                                }
                            }
                            
                            if(isset($_POST['Delete'])){
                                $str = "DELETE FROM discussions WHERE postNo = '$cn'"; 
                                if(mysqli_query($conN,$str)){
                                    echo "<script>location.href = 'index.php';</script>";
                                }
                            }
                        
                        ?>

                        <?php if(($p == 'Yes') && ($data['Verified'] == 'Yes')){ ?>
                        <span class="float-right">
                            <form action="" method="post">
                                <input type="hidden" name="pId" value="<?php echo $pn; ?>">
                                  &nbsp;<button type="submit" Name='Delete' class="btn btn-danger btn-sm">Remove</button>
                                  &nbsp;&nbsp;<button type="submit" Name='ReVify' class="btn btn-success btn-sm">unverify</button>
                             </form>
                         </span>
                        <?php } $cn = $_POST['pId'];

                            if(isset($_POST['ReVify'])){
                                $str = "UPDATE discussions SET Verified = 'No' WHERE postNo = '$cn'"; 
                                if(mysqli_query($conN,$str)){
                                    echo "<script>location.href = 'index.php';</script>";
                                }
                            }
                            
                            if(isset($_POST['Delete'])){
                                $str = "DELETE FROM discussions WHERE postNo = '$cn'"; 
                                if(mysqli_query($conN,$str)){
                                    echo "<script>location.href = 'index.php';</script>";
                                }
                            }

                        ?>

                        <?php if($data['Verified'] == 'Yes'){ ?>
                         <span class="float-right"><i class="fa fa-check" title="verified" style="color: green;" aria-hidden="true"></i>
                         </span>
                        <?php } ?>
                        </blockquote>

                        <p><span class="font-weight-bold">Posted by: </span><?php echo $data['Author'] ?>, <span class="font-weight-light font-italic"> <?php echo $data['PostTime'] ?> </span></p><br>
                        <p class="font-italic"> <?php echo $data['Discuss'] ?> </p>
            
                    </div>
                    <hr style="background: gray;">
                    <div class="clearfix"></div>

                   <?php }

            }else{

                echo '<script>document.getElementByClassName("right_side").style.display = "none";</script>';

                echo "<h1>You Have no running discussion, want to create?</h1?<br>";

                echo '<form action="" method="post">';
                echo '<button type="submit" name="Create" class="btn btn-success btn-sm">Create</button>';
                echo '</form>';
                echo '<small class="form-text text-muted" style="font-size:12px;">[n.b: If you create this, you will be the admin of the discussion panel. But no worries, you can change it later!]</small>';

            }

        ?>

        <?php

            if(isset($_POST['Create'])){

            $QR = "INSERT INTO disstudy(Varsity,Batch,Section,Admin) VALUES('$V','$B','$S','$id')";
            if(mysqli_query($conN,$QR)){

                echo "<script>alert('Congrats, it is now ready to use, you or your section mates can post now!');</script>";
                echo "<script>location.href = 'index.php';</script>";

            }
        }

        ?>
        
        </div>                                                                  

        <div class="card container float-left col-md-4 right_side">                                     
            <div class="card wrap_form mt-3 p-2">
                <div class="postxt">
                    <h5 class="text-center">Start a discussion</h5>
                </div>
                <div class="clearfix"></div>
                <form action="" method="post">
                <div class="form">
                    <label for="title">Title*</label><br>
                    <input name="title" id="" placeholder="title of the post" required style="width: 100%;"><br>
                    <label for="Post">Post*</label><br>
                    <textarea name="post" id="" rows="3" placeholder="What do you want to share..." required style="resize: none;width: 100%;"></textarea>
                </div>
                <div class="clearfix"></div>
                <button type="submit" name="Post" class="btn btn-success btn-sm">Post</button>
            </form>

            <?php

            if(isset($_POST['Post'])){

                $title = $_POST['title'] ;
                $Post = $_POST['post'];       

                $qR = "INSERT INTO discussions(postNo,Title,Discuss,Author,PostTime,Varsity,Batch,Section,Verified) VALUES ('0','$title', '$Post', '$id', CURRENT_TIMESTAMP(), '$V', '$B', '$S', 'No')";

                if(mysqli_query($conN,$qR)){
                    echo "<p>[Posted...]</p>";
                    echo "<script>location.href = 'index.php';</script>";
                }else{
                    echo "<p>ERROR!! Same Title Exists, please change yours.</p>";
                }

            }

            ?>

            </div>
            <div class="clearfix"></div>                     
        </div>
                                                                          
         <div class="clearfix"></div>                                                                 
    </div>     

    <div class="footer">
            <p style="text-align: center; color: gray; margin-top: 35px;">&copy; 2020 byteRhythms tech.</p>
    </div>

        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/dS_post.js"></script>

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