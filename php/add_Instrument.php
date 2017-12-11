<?php
include "../inc/add_Instrument.php";
session_start();
$TYPE=$_SESSION['TYPE'];
$USER=$_SESSION['USER'];
$PASS=$_SESSION['PASS'];
$NAME=$_SESSION['NAME'];
if((time()-$_SESSION['LOGIN_TIME'])>1200){
    echo"<script>alert('Session Timed out!')</script>";
    echo "<script>window.open('login.php','_self')</script>";
}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/main.css">
</head>




<body>


<header id="header">
    <p align="left"><a href="main_admin_window.php" id="logout">[back]</a></p>
    <p ALIGN="RIGHT"> Logged in as: <?php echo $NAME;?> <a href="login.php" id="logout">(logout)</a> </p>
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <span class="avatar"><img src="../img/logo.jpg" alt="" /></span>
</header>

<!-- You only need this form and the form-login.css -->

<form class="form-details" method="post" action="#">

    <div class="form-log-in-with-email">

        <div class="form-white-background">

            <div class="form-title-row">
                <h1>Add Instrument</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Instrument Name</span>
                    <input type="text" name="instrument_name" required placeholder="Enter Instrument Name" autocomplete="off">
                </label>
            </div>

            <div class="form-row">
                <button type="submit" name="add">Add</button>
            </div>
        </div>
    </div>
</form>


<?php
if (isset($_POST['add'])){
    $instrument_name=$_POST['instrument_name'];
    operation($instrument_name);

}

?>
</body>
</html>