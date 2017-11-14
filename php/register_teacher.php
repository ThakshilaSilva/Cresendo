<?php

session_start();
$TYPE=$_SESSION['TYPE'];
$USER=$_SESSION['USER'];
$PASS=$_SESSION['PASS'];
$NAME=$_SESSION['NAME'];


define('HOST', 'localhost');
define('NAME', 'db_group');
define('USER','root');
define('PASSWORD','');
$con1=mysqli_connect(HOST,USER,PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
$db=mysqli_select_db($con1,NAME) or die("Failed to connect to MySQL: " . mysqli_error());




include "../inc/instrument.php";
$instruments = get_instrument($con1);

include "../inc/register_teacher.php";
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
</head>

<header>
    <p align="left"><a href="main_admin_window.php" id="logout">[back]</a></p>
    <P ALIGN="RIGHT"> logged in as : <?php  echo $NAME;?> <a href="login.php" id="logout">(logout)</a></P>

    <h1>CRESCENDO MUSIC ACADEMY</h1>
    <span class="avatar"><img src="../img/logo.jpg" alt="" /></span>

</header>
<body>
<div class="main-content">

    <!-- You only need this form and the form-basic.css -->

    <form class="form-details"  method="post" action="#">
        <div class="form-log-in-with-email">

            <div class="form-white-background">

        <div class="form-title-row">
            <h1>Teacher Registration</h1>
        </div>

        <div class="form-row">
            <label>
                <span>First Name</span>
                <input type="text" name="name1"  required value="<?= isset($_POST['name1']) ? $_POST['name1'] : ''; ?>">
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Last Name</span>
                <input type="text" name="name2" required value="<?= isset($_POST['name2']) ? $_POST['name2'] : ''; ?>">
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Birthday</span>
                <input type="date" name="bday" required value="<?= isset($_POST['bday']) ? $_POST['bday'] : ''; ?>">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Address</span>
                <input type="text" name="address" required value="<?= isset($_POST['address']) ? $_POST['address'] : ''; ?>" >
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Province</span>
                <input type="text" name=province  required value="<?= isset($_POST['province']) ? $_POST['province'] : ''; ?>">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>City</span>
                <input type="text" name="city" required value="<?= isset($_POST['city']) ? $_POST['city'] : ''; ?>">
            </label>
        </div>



        <div class="form-row">
            <label>
                <span>Gender</span>
                <select name="gender" required value="<?= isset($_POST['gender']) ? $_POST['gender'] : ''; ?>">
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </label>
        </div>




        <!-- <div class="form-row">
            <label>
                <span>Instrument</span>
                <select name="instrument" required value="<?= isset($_POST['instrument']) ? $_POST['instrument'] : ''; ?>">
                    <option>Violene</option>
                    <option>Guitar</option>
                    <option>Tabla</option>
                    <option>Piano</option>
                    <option>Flute</option>
                </select>
            </label>
        </div>-->


        <div class="form-row">
            <label>
                <span>Instrument</span>
                <select id="instrument" name="instrument">
                    <?php for ($j = 0 ; $j< sizeof($instruments); $j++):?>
                        <option> <?php echo $instruments[$j];?></option>
                    <?php endfor; ?>
                </select>

            </label>
        </div>




        <div class="form-row">
            <label>
                <span>ContactNo-1</span>
                <input type="number" name="tp1" value="<?= isset($_POST['tp1']) ? $_POST['tp1'] : ''; ?>">
            </label>
        </div>


        <div class="form-row">
            <label>
                <span>ContactNo-2</span>
                <input type="number" name="tp2" value="<?= isset($_POST['tp2']) ? $_POST['tp2'] : ''; ?>">
            </label>
        </div>

        <div class="form-row">
            <button type="submit" name="submit">Register</button>
        </div>
            </div>
        </div>
    </form>
</div>

<?php
if(isset($_POST['submit'])){

    $tp1=$_POST['tp1'];
    $tp2=$_POST['tp2'];
    $name1=$_POST['name1'];
    $name2=$_POST['name2'];
    $bday=$_POST['bday'];
    $address=$_POST['address'];
    $province=$_POST['province'];
    $city=$_POST['city'];
    $gender=$_POST['gender'];
    $instrument=$_POST['instrument'];

    $con1->close();

    operation($tp1,$tp2,$name1,$name2,$gender,$bday,$address,$province,$city,$instrument,$TYPE);








}

?>

</body>