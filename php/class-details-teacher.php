<?php
include "../inc/class-details.php";
$arr=operationResults();
$row1=$arr[3];
$Instrument=$arr[0];
$Term=$arr[1];
$Year=$arr[2];
$FirstName=$row1['FirstName'];
$LastName=$row1['LastName'];

$row2=$arr[4];
$no_of_stu=$row2['COUNT(S_ID)'];

$row3=$arr[5];
$capacity=$row3['Capacity'];
$available_stu=(int)$capacity-(int)$no_of_stu;

$row4=$arr[6];
if($row4['Active']){
    $status='Active';
}else{
    $status='Completed';
}
if($row4['Class_Type']=='G'){
    $class_type='Group Class';
}else{
    $class_type='Individual Class';
}

/*

if(isset($_GET['View_Details'])) {

    $Class = $_GET['class'];

    $Class = $Class[strlen($Class) - 1];
    session_start();
    $Instrument = $_SESSION['instrument'];
    $Term = $_SESSION['Term'];
    $Year = $_SESSION['Year'];
    $classes = $_SESSION['class'];
    $ClassID = $classes[$Class - 1];


    /*   $TYPE=$_SESSION['TYPE'];
       $USER=$_SESSION['USER'];
       $PASS=$_SESSION['PASS'];
       $NAME=$_SESSION['NAME'];
   */

#select the instrument id from instrument table;






?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="class details" content="width=device-width, initial-scale=1">

    <title>Class Details</title>

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/main.css">

    <?php

    $con= mysqli_connect("localhost","root","","db_group");
    if(mysqli_connect_errno()){
        echo"<script>alert('Error Connecting to Database!')</script>";
        exit();
    }
    ?>

</head>

<body>


<header id="header">
    <!--<p ALIGN="RIGHT"> Logged in as: <?php /*echo $NAME;*/?> a href="login.php" id="logout">(logout)</a></p>-->
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <!--  <span class="avatar"><img src="images/avatar.jpg" alt="" /></span> -->
</header>



<form class="class details" method="get" action="view-class-teacher.php">



    <div class="form-log-in-with-email">

        <div class="form-white-background">

            <div class="form-title-row">
                <h1>Class Details</h1>
            </div>


            <div class="form-row">
                <label>
                    <span>Instrument :</span>
                    <label><?php echo $Instrument?></label>

                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Year :</span>
                    <label><?php
                        echo $Year?></label>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Term :</span>
                    <label><?php echo $Term?></label>

                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>No. of reg. students:</span>
                    <label ><?php echo $no_of_stu. ' Students'
                        ?></label>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>No. of available students:</span>
                    <label ><?php echo $available_stu. ' Students'
                        ?></label>
            </div>
            <div class="form-row">
                <label>
                    <span>Teacher :</span>
                    <label ><?php echo $FirstName.' '.$LastName?></label>

                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Status :</span>
                    <label ><?php echo $status.' Class'?></label>

                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Class type:</span>
                    <!-- --><?php echo $class_type?>
                </label>
            </div>

            <!--<div class="form-row">
                <button type="submit" name="next class" > Next Class </button>
            </div>-->
            <p ALIGN="RIGHT"> <a href="view-class-next-teacher.php" id="goback">[Back]</a> </p>
            <p ALIGN="RIGHT"> <a href="" id="goback">[Home]</a></p>

        </div>

    </div>


</form>


</body>

</html>
