<?php
include "../inc/register_student.php";

session_start();
$TYPE=$_SESSION['TYPE'];
$USER=$_SESSION['USER'];
$PASS=$_SESSION['PASS'];
$NAME=$_SESSION['NAME'];

?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="jquery-ui.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(function() {

            //autocomplete
            $(".auto1").autocomplete({
                source: "../inc/search_sibling.php",
                minLength: 1
            });

        });
    </script>
    <script type="text/javascript">
        $(function() {

            //autocomplete
            $(".auto2").autocomplete({
                source: "../inc/search_sibling.php",
                minLength: 1
            });

        });
    </script>
</head>


<header>
    <p align="left"><a href="main_admin_window.php" id="logout">[back]</a></p>
    <P ALIGN="RIGHT"> logged in as : <?php  echo $NAME;?>  <a href="login.php" id="logout">(logout)</a></P>
    <h1>CRESCENDO MUSIC ACADEMY</h1>

</header>


<body>
<div class="main-content">

    <!-- You only need this form and the form-basic.css -->

    <form class="form-details"  method="post" action="#">
        <div class="form-log-in-with-email">

            <div class="form-white-background">

        <div class="form-title-row">
            <h1>Student Registration</h1>
        </div>

        <div class="form-row">
            <label>
                <span>First Name</span>
                <input type="text" name="name1"  required value="<?= isset($_POST['name1']) ? $_POST['name1'] : ''; ?>" autocomplete="off">
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Last Name</span>
                <input type="text" name="name2" required value="<?= isset($_POST['name2']) ? $_POST['name2'] : ''; ?>" autocomplete="off">
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Birthday</span>
                <input type="date" name="bday" value="<?= isset($_POST['bday']) ? $_POST['bday'] : ''; ?>" required>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Address</span>
                <input type="text" name="address" value="<?= isset($_POST['address']) ? $_POST['address'] : ''; ?>" autocomplete="off" required>
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Province</span>
                <input type="text" name=province  value="<?= isset($_POST['province']) ? $_POST['province'] : ''; ?>" autocomplete="off" required>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>City</span>
                <input type="text" name="city" value="<?= isset($_POST['city']) ? $_POST['city'] : ''; ?>" autocomplete="off" required>
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
            <label>
                <span> ParentDetails</span>

            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Parent First Name</span>
                <input type="text" name="p1name1" value="<?= isset($_POST['p1name1']) ? $_POST['p1name1'] : ''; ?>" autocomplete="off" required>
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Parent Last Name</span>
                <input type="text" name="p1name2" value="<?= isset($_POST['p1name2']) ? $_POST['p1name2'] : ''; ?>" autocomplete="off" required>
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Relation</span>
                <select name="p1relation" value="<?= isset($_POST['p1relation']) ? $_POST['p1relation'] : ''; ?>" >
                    <option>Father</option>
                    <option>Mother</option>
                    <option>Guardian</option>
                </select>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Address</span>
                <input type="text" name="p1address" value="<?= isset($_POST['p1address']) ? $_POST['p1relation'] : ''; ?>" autocomplete="off" required>
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Province</span>
                <input type="text" name=p1province value="<?= isset($_POST['p1province']) ? $_POST['p1province'] : ''; ?>" autocomplete="off" required>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>City</span>
                <input type="text" name="p1city" value="<?= isset($_POST['p1city']) ? $_POST['p1city'] : ''; ?>"  autocomplete="off" required>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>ContactNo-1</span>
                <input type="number" name="p1tp1" value="<?= isset($_POST['p1tp1']) ? $_POST['p1tp1'] : ''; ?>">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>ContactNo-2</span>
                <input type="number" name="p1tp2" value="<?= isset($_POST['p1tp2']) ? $_POST['p1tp2'] : ''; ?>">
            </label>
        </div>
                <div class="form-row">
                    <label>
                        <span> SiblingDetails</span>

                    </label>
                </div>

        <div class="form-row">
            <label>
                <span>SiblingDetails-1</span>
                <input type="text" name="sib1" class="auto1" value="<?= isset($_POST['sib1']) ? $_POST['sib1'] : ''; ?>">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>SiblingDetails-2</span>
                <input type="text" name="sib2" class="auto2" value="<?= isset($_POST['sib2']) ? $_POST['sib2'] : ''; ?>">
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
    $p1tp1=$_POST['p1tp1'];
    $p1tp2=$_POST['p1tp2'];
    $p2tp1=$_POST['p2tp1'];
    $p2tp2=$_POST['p2tp2'];

    $name1=$_POST['name1'];
    $name2=$_POST['name2'];
    $bday=$_POST['bday'];
    $address=$_POST['address'];
    $province=$_POST['province'];
    $city=$_POST['city'];
    $gender=$_POST['gender'];


    #insert sib_details
    $sib1=$_POST['sib1'];
    $sib2=$_POST['sib2'];



    $p1name1=$_POST['p1name1'];
    $p1name2=$_POST['p1name2'];
    $p1relation=$_POST['p1relation'];
    $p1address=$_POST['p1address'];
    $p1province=$_POST['p1province'];
    $p1city=$_POST['p1city'];

    operation($tp1,$tp2,$p1tp1,$p1tp2,$p2tp2,$p2tp1,$name1,$name2,$gender,$bday,$address,$province,$city,$p1name1,$p1name2,$p1relation,$p1address,$p1city,$p1province,$sib1,$sib2,$TYPE);

}
?>


</body>

</html>
