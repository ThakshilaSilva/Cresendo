<?php
include "connect.php";
$con = connect();
#$instruments = get_instrument($con);
include "../inc/instrument.php";
$instruments = get_instrument($con);


?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Select Instrument</title>

    <link rel="stylesheet" href="../css/demo1.css">
    <link rel="stylesheet" href="../css/main1.css">



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



<form class="form-details" method="get" action="progress-select-class.php">

    <div class="form-log-in-with-email">

        <div class="form-white-background">

            <div class="form-title-row">
                <h1>View Progress</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Year :</span>
                    <input type="number" name="Year" autocomplete="off" required>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Term :</span>
                    <input type="number" name="Term" autocomplete="off" required>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Instrument</span>
                    <input type="=text" list="instruments" name="instrument" id="instrument" autocomplete="off" required/>
                    <datalist id="instruments">
                        <?php for ($j = 0 ; $j< sizeof($instruments); $j++):?>
                            <option> <?php echo $instruments[$j];?></option>
                        <?php endfor;?>

                    </datalist>


                </label>
            </div>




            <div class="form-row">
                <button type="submit" name="next1"> Next</button>
            </div>
            <p ALIGN="RIGHT"> <a href="main_teacher_window.php" id="goback">[Back]</a></p>
        </div>



    </div>

</form>
</body>

</html>
