<?php

if (isset($_GET['save'])){
    session_start();
    $id=$_SESSION['t_id'];
    $fname=$_GET['fname'];
    $lname=$_GET['lname'];
    $dob=$_GET['date'];
    $address=$_GET['address'];
    $province=$_GET['province'];
    $city=$_GET['city'];
    $gender=$_GET['gender'];
    $ttp1=$_GET['mobile1'];
    $ttp2=$_GET['mobile2'];
    $tp1=$_SESSION['tp1'];
    $tp2=$_SESSION['tp2'];
    include '../Inc/update_student_details.php';
    $message=update($id,$fname,$lname,$dob,$address,$province,$city,$gender,$ttp1,$ttp2,$tp1,$tp2);
    $NAME=$_SESSION['NAME'];
    if((time()-$_SESSION['LOGIN_TIME'])>1200){
        echo"<script>alert('Session Timed out!')</script>";
        echo "<script>window.open('login.php','_self')</script>";
    }

    $_SESSION['LOGIN_TIME']=time();
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/form-basic.css">
    <link rel="stylesheet" href="../css/new.css">
    <link rel="stylesheet" href="../css/main.css">
</head>

<header>
    <p ALIGN="RIGHT"> Logged in as: <?php echo $NAME;?> <a href="login.php" id="logout">(logout)</a></p>
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <span class="avatar"><img src="../img/logo.jpg" alt="" /></span>

</header>

<div class="main-content">
    <div class="wrap-form">

        <div class="wrap">
            <div class="mes">
                <span><?php echo htmlspecialchars($message)?></span>
            </div>

            <a href="t_edit_profile_main.php" class="button">Go to Edit Window</a>
            <a href="#" class="button">Go to Main Window</a>
        </div>
    </div>




</div>
</body>
</html>
