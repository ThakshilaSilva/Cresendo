<?php
include "connect.php";
$con = connect();
session_start();
$Instrument=$_SESSION['instrument'];

if(isset($_GET['next2'])){

    $classes=$_SESSION['class'];

    $class=$_GET['class'];

    $Class_id = $classes[(int)$class[strlen($class) - 1]-1];

    $stmt1 = $con->prepare('select Active from class where Class_id=?');
    $stmt1->bind_param("s",$Class_id);
    $stmt1->execute();
    $result=$stmt1->get_result();
    $row1=$result->fetch_assoc();
    $State=$row1['Active'];
    if($State==1) {
        $State = 'True';

    }else{
        $State='False';
    }

    $_SESSION['classid']=$Class_id;
    $_SESSION['state']=$State;




}
$State=$_SESSION['state'];
/*$Instrument=$_SESSION['instrument'];
$Term=$_SESSION['Term'];
$Year=$_SESSION['Year'];
$classes=$_SESSION['class'];*/

/*$TYPE=$_SESSION['TYPE'];
$USER=$_SESSION['USER'];
$PASS=$_SESSION['PASS'];
$NAME=$_SESSION['NAME'];*/

/*$stmt=$con->prepare("SELECT FirstName,LastName FROM person WHERE ID in(SELECT S_ID from participate WHERE Class_id=?)");
$stmt->bind_param("sss",$Year,$Term,$Instrument);
$stmt->execute();
$result=$stmt->get_result();
$classes=array();
while($row = $result->fetch_assoc()) {
    $classes[] = $row['Class_id'];
}*/

?>

<?php

$Class_id=$_SESSION['classid'];
/*$classes=$_SESSION['class'];
$Term=$_SESSION['Term'];
$Year=$_SESSION['Year'];*/

/*
$stmt=$con->prepare("SELECT Active FROM class WHERE Class_id=?");
$stmt->bind_param("s",$Class_id);
$stmt->execute();
$result=$stmt->get_result();
$row = $result->fetch_assoc();
$State=$row['Active'];
if($State==0){
    $State='False';
}else{
    $State='True';
}*/

$stmt=$con->prepare("SELECT FirstName,LastName,S_ID FROM participate NATURAL JOIN person WHERE Class_id=? AND participate.S_ID=Person.ID;");
$stmt->bind_param("s",$Class_id);
$stmt->execute();
$result=$stmt->get_result();
$names=array();

while($row = $result->fetch_assoc()) {
    $names[] = $row['FirstName'].' '.$row['LastName'].' '.$row['S_ID'];
}

?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="GView Progress" content="width=device-width, initial-scale=1">

    <title>Class Details</title>

    <link rel="stylesheet" href="../css/demo1.css">
    <link rel="stylesheet" href="../css/main1.css">




</head>



<body>


<header id="header">
    <!-- <p ALIGN="RIGHT"> Logged in as: <?php /*echo $NAME;*/?> <a href="login.php" id="logout">(logout)</a></p>-->
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <!--  <span class="avatar"><img src="images/avatar.jpg" alt="" /></span> -->
</header>


<form class="view class" method="get" action="progress-report.php">



    <div class="form-log-in-with-email">

        <div class="form-white-background">

            <div class="form-title-row">
                <h1>View Progress</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Student Name :</span>
                    <input type="=text" list="names" name="name" id="name" autocomplete="off" required/>
                    <datalist id="names">

                        <?php for ($j = 0 ; $j< sizeof($names); $j++):?>
                            <option> <?php echo $names[$j];?></option>


                        <?php endfor;?>

                    </datalist>

                </label>
            </div>
            <div class="form-row">
                <button type="submit" name="view"> View Progress</button>
            </div>
            <p ALIGN="RIGHT"> <a href="select-class-teacher.php" id="goback">[Back]</a></p>


        </div>


    </div>

</form>


</body>

</html>
