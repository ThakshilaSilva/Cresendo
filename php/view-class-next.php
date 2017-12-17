<?php
session_start();
$Instrument=$_SESSION['instrument'];
$Term=$_SESSION['Term'];
$Year=$_SESSION['Year'];
$classes=$_SESSION['class'];

/*$TYPE=$_SESSION['TYPE'];
$USER=$_SESSION['USER'];
$PASS=$_SESSION['PASS'];
$NAME=$_SESSION['NAME'];*/


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="view class" content="width=device-width, initial-scale=1">

    <title>Class Details</title>

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/main.css">




</head>



<body>


<header id="header">
    <!-- <p ALIGN="RIGHT"> Logged in as: <?php /*echo $NAME;*/?> <a href="login.php" id="logout">(logout)</a></p>-->
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <!--  <span class="avatar"><img src="images/avatar.jpg" alt="" /></span> -->
</header>


<form class="view class" method="get" action="class-details.php">



    <div class="form-log-in-with-email">

        <div class="form-white-background">

            <div class="form-title-row">
                <h1>Instrument Classes</h1>
            </div>
            <div class="form-row">
                <label>
                    <span>Class</span>
                    <input type="=text" list="classes" name="class" id="class" autocomplete="off" required/>
                    <datalist id="classes">
                        <?php for ($j = 0 ; $j< sizeof($classes); $j++):?>
                            <option> <?php echo $classes[$j];?></option>
                        <?php endfor;?>

                    </datalist>

                </label>
            </div>
            <div class="form-row">
                <button type="submit" name="View_Details"> View Details</button>
            </div>
            <p ALIGN="RIGHT"> <a href="view_class_details.php" id="goback">>Go Back<</a></p>


        </div>


    </div>

</form>


</body>

</html>
