<?php
include "../inc/connect.php";
$con = connect();
session_start();
#$instruments = get_instrument($con);

$stmt="SELECT FirstName, LastName, ID FROM person NATURAL JOIN teacher WHERE ID=T_ID ";
$result = $con->query($stmt);

$tnames=array();
while($row = $result->fetch_assoc()) {
    $tnames[] = $row['FirstName'].' '.$row['LastName'].'-'.$row['ID'];
}
$T_ID=$row['ID'];

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>View Details</title>

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/main.css">



</head>



<body>
<?php
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



<form class="form-details" method="get" action="mark-attendance-teacher.php">

    <div class="form-log-in-with-email">

        <div class="form-white-background">

            <div class="form-title-row">
                <h1>Teacher Attendance</h1>
            </div>


            <div class="form-row">
                <label>
                    <span>Teacher</span>
                    <input type="=text" list="tnames" name="tname" id="tname" autocomplete="off" required/>
                    <datalist id="tnames">
                        <?php for ($j = 0 ; $j< sizeof($tnames); $j++):?>
                            <option> <?php echo $tnames[$j];?></option>
                        <?php endfor;?>

                    </datalist>


                </label>
            </div>




            <div class="form-row">
                <button type="submit" name="next"> Next</button>
            </div>
            <p ALIGN="RIGHT"> <a href="main_admin_window.php" id="goback">[Back]</a></p>
        </div>



    </div>

</form>
</body>

</html>
