<?php
include "connect.php";
$con = connect();
session_start();
$Instrument=$_SESSION['instrument'];


if(isset($_GET['view'])){
$Name = $_GET['name'];
$pieces = explode(" ", $Name);
$FirstName=$pieces[0];
$LastName=$pieces[1];

$stmt1 = $con->prepare('SELECT S_ID FROM participate NATURAL JOIN Person WHERE FirstName=? and LastName=?');
$stmt1->bind_param("ss",$FirstName,$LastName);
$stmt1->execute();
$result=$stmt1->get_result();
$row1=$result->fetch_assoc();
$S_ID=$row1['S_ID'];

$dic=array();
$stmt3 = $con->prepare("SELECT Exam_Title,Grade from Grades NATURAL join Exam where Student_id=?");
$stmt3->bind_param("s",$S_ID);
$stmt3->execute();
$stmt3->bind_result($Exam,$Grade);

while ($stmt3->fetch()){
$dic[$Exam]=$Grade;
}

//echo print_r($dic,true);
//$stmt3->fetch();
$stmt3->close();
$_SESSION['dic']=$dic;
$_SESSION['grade']=$Grade;
$_SESSION['exam']=$Exam;
}
?>
<?php
$dic=$_SESSION['dic'];
$Grade=$_SESSION['grade'];
$Exam=$_SESSION['exam'];
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



<div class="container">

    <?php foreach($dic as $key => $value):?>

        <div class="progress">
            <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow=<?php echo $value;?> aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($value/$max_count)*100;?>%">
                <?php echo $key."    ".$value?>
            </div>
        </div>



    <?php endforeach;?>

</div>


<body>


<header id="header">
    <!-- <p ALIGN="RIGHT"> Logged in as: <?php /*echo $NAME;*/?> <a href="login.php" id="logout">(logout)</a></p>-->
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <!--  <span class="avatar"><img src="images/avatar.jpg" alt="" /></span> -->
</header>


</body>
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
</html>

