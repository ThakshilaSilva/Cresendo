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
$amount_ad;
$amount_fee1;

$stmt3 = $con1->prepare("SELECT Fee_charge FROM Student_charges WHERE  Class_Type=?");
$stmt3->bind_param("s", $type1);
$stmt3->execute();
$stmt3->bind_result($amount_fee1);
$stmt3->fetch();
$stmt3->close();

$type2="I";
$amount_fee2;
$stmt4 = $con1->prepare("SELECT Fee_charge FROM Student_charges WHERE  Class_Type=?");
$stmt4->bind_param("s", $type2);
$stmt4->execute();
$stmt4->bind_result($amount_fee2);
$stmt4->fetch();
$stmt4->close();


#$con1->close();
?>


    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Allocations</title>

        <link rel="stylesheet" href="../css/demo.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />


        <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-ui.js"></script>

        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>

        <script type="text/javascript">
            $(function() {

                //autocomplete
                $(".auto1").autocomplete({
                    source: "../inc/search_student.php",
                    minLength: 1
                });

            });
        </script>
    </head>
    <header>
        <p align="left"><a href="main_admin_window.php" id="logout">[back]</a></p>
        <p ALIGN="RIGHT"> Logged in as: <?php echo $NAME;?> <a href="login.php" id="logout">(logout)</a></p>
        <h1>CRESCENDO MUSIC ACADEMY</h1>
        <span class="avatar"><img src="../img/logo.jpg" alt="" /></span>

    </header>

    <body>
    <div class="main-content">


        <form class="form-details"  method="post" action="#">
            <div class="form-log-in-with-email">

                <div class="form-white-background">


                    <div class="form-title-row">
                        <h1>Edit Student Charges</h1>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Admission Fee:</span>
                            <input type="number" name="amount_ad" class="auto1" required  value="<?php echo $amount_ad?>">
                        </label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Group Class Fee:</span>
                            <input type="number" name="amount_fee1" class="auto1" required  value="<?php echo $amount_fee1?>">
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <span>Individual Class Fee:</span>
                            <input type="number" name="amount_fee2" class="auto1" required  value="<?php echo $amount_fee2?>">
                        </label>
                    </div>





                    <div class="form-row">
                        <button type="submit" name="submit">Save Changes</button>
                    </div>
                </div>
            </div>


        </form>
    </div>

    </body>

<?php
if(isset($_POST['submit'])) {
    $amount_ad = $_POST['amount_ad'];
    $amount_fee1 = $_POST['amount_fee1'];
    $amount_fee2 = $_POST['amount_fee2'];

   try{

    $type1='G';
    $type2='I';
    $stmt3 = $con1->prepare("UPDATE Student_charges SET Admission_Charge=? ,Fee_Charge=? WHERE Class_Type=?");
    $stmt3->bind_param("sss", $amount_ad,$amount_fee1,$type1);
    $result3=$stmt3->execute();
    $stmt3->close();

    $stmt4 = $con1->prepare("UPDATE Student_charges SET Admission_Charge=? ,Fee_Charge=? WHERE Class_Type=?");
    $stmt4->bind_param("sss", $amount_ad,$amount_fee2,$type2);
    $result4=$stmt4->execute();
    $stmt4->close();
    $con1->close();
    if($result3 and $result4){
        echo "<script>alert('Successfully Updated !')</script>";
        echo "<script>window.open('main_admin_window.php','_self')</script>";
    } else{
        echo "<script>alert('Update Failed !')</script>";
    }}
    catch (Exception $e) {
        echo "<script>alert('Error Occur in connecting to the Database !')</script>";
        echo "<script>window.open('main_admin_window.php','_self')</script>";

   }



}
?>