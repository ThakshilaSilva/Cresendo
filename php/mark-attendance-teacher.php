<?php
include "../inc/connect.php";
$con = connect();
session_start();
#$instruments = get_instrument($con);
if(isset($_GET['next'])){

    $inputname=$_GET['tname'];

    $T_ID = substr($inputname, -7);
    $T_name=substr($inputname, 0, -8);
    $_SESSION['tname']=$T_name;
    $_SESSION['tid']=$T_ID;

    $Date=date("Y.m.d") . "<br>";
    $_SESSION['date']=$Date;

    $stmt = $con->prepare('select Class_id from conduct where Teacher_id=?');
    $stmt->bind_param("s",$T_ID);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();
    $stmt->close();

    $Class_id=$row['Class_id'];
    $_SESSION['classid']=$Class_id;




}






?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>View Details</title>

    <link rel="stylesheet" href="../css/demo1.css">
    <link rel="stylesheet" href="../css/main1.css">



</head>



<body>
<?php
if(isset($_GET['save'])) {

    $T_name=$_SESSION['tname'];
    $T_ID=$_SESSION['tid'];
    $Date=$_SESSION['date'];
    $Class_id=$_SESSION['classid'];
    $state = ($_GET['attendance']);
    $State = $state === 'True'? true: false;
    echo $State;

    $stmt1 = $con->prepare("INSERT INTO tattendance (Teacher_id, Class_id, Date, State) VALUES (?, ?, ?, ?)");
    $stmt1->bind_param("ssss", $T_ID, $Class_id, $Date, $State);
    $result1=$stmt1->execute();
    $stmt1->close();

    echo "<script>window.open('select-teacher-attendance.php','_self') </script>";
}
/*
session_start();
$TYPE=$_SESSION['TYPE'];
$USER=$_SESSION['USER'];
$PASS=$_SESSION['PASS'];
$NAME=$_SESSION['NAME'];

*/?>

<header id="header">
    <!--<p ALIGN="RIGHT"> Logged in as: <?php /*echo $NAME;*/?> <a href="login.php" id="logout">(logout)</a></p>-->
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <!--  <span class="avatar"><img src="images/avatar.jpg" alt="" /></span> -->
</header>



<form class="form-details" method="get" action=#>

    <div class="form-log-in-with-email">

        <div class="form-white-background">

            <div class="form-title-row">
                <h1>Teacher Attendance</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Teacher Name:</span>
                    <?php echo $T_name;?>

                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Teacher ID:</span>
                    <?php echo $T_ID;?>

                </label>
            </div>



            <div class="form-row">
                <label>
                    <span>Date:</span>
                    <?php echo $Date;?>

                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>State:</span>
                    <select name="attendance">
                        <option name="attendance" value="True">Present</option>
                        <option name="attendance"value="False">Absent</option>

                    </select>

                </label>
            </div>





            <div class="form-row">
                <button type="submit" name="save"> Save</button>
            </div>
            <p ALIGN="RIGHT"> <a href="select-teacher-attendance.php" id="goback">[Back]</a></p>
        </div>



    </div>

</form>
</body>

</html>
