<?php
if (isset($_GET['save2'])){
    session_start();
    $p_id=$_SESSION['p_id'];
    $pfname=$_GET['pfname'];
    $plname=$_GET['plname'];
    $prelation=$_GET['prelation'];
    $paddress=$_GET['paddress'];
    $pprovince=$_GET['pprovince'];
    $pcity=$_GET['pcity'];
    $ptp1=$_GET['pmobile1'];
    $ptp2=$_GET['pmobile2'];
    $tp1=$_SESSION['ptp1'];
    $tp2=$_SESSION['ptp2'];

    include '../Inc/update_parent_details.php';
    $message=update($p_id,$pfname,$plname,$prelation,$paddress,$pprovince,$pcity,$ptp1,$ptp2,$tp1,$tp2);
}

if (isset($_GET['save3'])){
    $sib1=$_GET['sib1'];
    $sib2=$_GET['sib2'];
    $split_class=explode(" ",$sib1);
    $id1=$split_class[2];
    $split_class=explode(" ",$sib2);
    $id2=$split_class[2];
    session_start();
    $id=$_SESSION['id'];
    $sib1=$_SESSION['sib1'];
    $sib2=$_SESSION['sib2'];

    include '../Inc/update_sibling_details.php';
    $message=update($id,$id1,$id2,$sib1,$sib2);
}

if (isset($_GET['save1'])){
    session_start();
    $id=$_SESSION['id'];
    $fname=$_GET['fname'];
    $lname=$_GET['lname'];
    $dob=$_GET['date'];
    $address=$_GET['address'];
    $province=$_GET['province'];
    $city=$_GET['city'];
    $gender=$_GET['gender'];
    $stp1=$_GET['mobile1'];
    $stp2=$_GET['mobile2'];
    $tp1=$_SESSION['tp1'];
    $tp2=$_SESSION['tp2'];
    include '../Inc/update_student_details.php';
    $message=update($id,$fname,$lname,$dob,$address,$province,$city,$gender,$stp1,$stp2,$tp1,$tp2);
}

$NAME=$_SESSION['NAME'];
if((time()-$_SESSION['LOGIN_TIME'])>1200){
    echo"<script>alert('Session Timed out!')</script>";
    echo "<script>window.open('login.php','_self')</script>";
}

$_SESSION['LOGIN_TIME']=time();
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

</header>

<div class="main-content">
    <div class="wrap-form">

        <div class="wrap">
            <div class="mes">
                <span><?php echo htmlspecialchars($message)?></span>
            </div>

            <a href="edit_profile_main.php" class="button">Go to Edit Window</a>
            <a href="main_admin_window.php" class="button">Go to Main Window</a>
        </div>
    </div>




</div>
</body>
</html>
