<?php
session_start();
$TYPE=$_SESSION['TYPE'];
$USER=$_SESSION['USER'];
$PASS=$_SESSION['PASS'];
$NAME=$_SESSION['NAME'];

#include "../inc/Teacher_class_Allocation.php";
include "../inc/connect_user.php";



$con1=connect($TYPE);
$type1="G";
$instrument;
$count;
$max_count=1;

$dic=array();
$stmt3 = $con1->prepare("SELECT Title,Count(S_ID)from participate NATURAL join Class NATURAL JOIN instrument GROUP BY Instrument_id");
$stmt3->execute();
$stmt3->bind_result($instrument,$count);

while ($stmt3->fetch()){
    $dic[$instrument]=$count;
    if($count>$max_count){
        $max_count=$count;
    }

}
//echo print_r($dic,true);
//$stmt3->fetch();
$stmt3->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/bootstra_charts.css">
    <link rel="stylesheet" href="../css/main.css">


</head>
<body>

<header id="header">
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <span class="avatar"><img src="../img/logo.jpg" alt="" /></span>
</header>

<h1 align="center">Analysis of Student Distribution </h1>

<?php
$n=25;
$tot=array();
$tot[]=25;
$tot[]=40;

?>

<div class="container">

    <?php foreach($dic as $key => $value):?>

    <div class="progress">
        <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow=<?php echo ($value/$max_count)*100;?> aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($value/$max_count)*100;?>%">
            <?php echo $key."    ".$value."  Students"?>
        </div>
    </div>



    <?php endforeach;?>

</div>

</body>
</html>
