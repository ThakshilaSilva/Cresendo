<?php

if(isset($_GET['View_Details'])) {

    $Class = $_GET['class'];

    session_start();
    $Instrument=$_SESSION['instrument'];
    $Term=$_SESSION['Term'];
    $Year=$_SESSION['Year'];



 /*   $TYPE=$_SESSION['TYPE'];
    $USER=$_SESSION['USER'];
    $PASS=$_SESSION['PASS'];
    $NAME=$_SESSION['NAME'];
*/

    #select the instrument id from instrument table;



}


?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="class details" content="width=device-width, initial-scale=1">

    <title>Class Details</title>

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/main.css">

    <?php

    $con= mysqli_connect("localhost","root","","db_group");
    if(mysqli_connect_errno()){
        echo"<script>alert('Error Connecting to Database!')</script>";
        exit();
    }
    ?>

</head>

<body>


<header id="header">
    <!--<p ALIGN="RIGHT"> Logged in as: <?php /*echo $NAME;*/?> a href="login.php" id="logout">(logout)</a></p>-->
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <!--  <span class="avatar"><img src="images/avatar.jpg" alt="" /></span> -->
</header>



<form class="class details" method="get" action="view-class.php">



    <div class="form-log-in-with-email">

        <div class="form-white-background">

            <div class="form-title-row">
                <h1>Class Details</h1>
            </div>


            <div class="form-row">
                <label>
                    <span>Instrument :</span>
                    <label><?php echo $Instrument?></label>

                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Year :</span>
                    <label><?php
                        echo $Year?></label>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Term :</span>
                    <label><?php echo $Term?></label>

                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>No. of students:</span>
                    <!--<label ><?php
/*                        $stmt=$con->prepare("select count(Student_id) from participate where Class_id=?");
                        $stmt->bind_param("s", $Class);
                        $stmt->execute();
                        $result=$stmt->get_result();
                        $row=$result->fetch_assoc();
                        echo trim($row["count(Student_id)"]);
                        */?></label>-->
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Teacher :</span>
                    <!--<label ><?php
/*                        $stmt=$con->prepare("select FirstName  from person WHERE ID in (select Teacher_id from conduct WHERE Class_id=? AND Year=? AND Term=?)");
                        $stmt->bind_param("sss", $Class,$Year,$Term);
                        $stmt->execute();
                        $result=$stmt->get_result();
                        $row=$result->fetch_assoc();
                        echo $row["FirstName"];
                        $stmt=$con->prepare("select LastName  from person WHERE ID in (select Teacher_id from conduct WHERE Class_id=? AND Year=? AND Term=?)");
                        $stmt->bind_param("sss", $Class,$Year,$Term);
                        $stmt->execute();
                        $result=$stmt->get_result();
                        $row=$result->fetch_assoc();
                        echo ' ';
                        echo $row["LastName"];
                        */?></label>-->

                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Status :</span>
                    <?php
/*                    $stmt=$con->prepare("select Active from Class WHERE Year=? AND Term=?");
                    $stmt->bind_param("ss", $Year,$Term);
                    $stmt->execute();
                    $result=$stmt->get_result();
                    $row=$result->fetch_assoc();
                    if(trim($row["Active"])==1){
                        echo 'Active class';
                    }else{
                        echo 'completed class';
                    } ;

                    */?>

                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Class type</span>
                   <!-- --><?php
/*                    $stmt=$con->prepare("select Class_Type from Class WHERE instrument_id in(select instrument_id from instrument WHERE Title=? )");
                    $stmt->bind_param("s", $Instrument);
                    $stmt->execute();
                    $result=$stmt->get_result();
                    $row=$result->fetch_assoc();
                    if(trim($row["Class_Type"])=='G'){
                        echo 'Group Class';
                    }else{
                        echo 'Individual Class ';
                    } ;
                    */?>
                </label>
            </div>

            <!--<div class="form-row">
                <button type="submit" name="next class" > Next Class </button>
            </div>-->
            <p ALIGN="RIGHT"> <a href="view_class.php" id="goback">>Go Back<</a></p>

        </div>

    </div>


</form>


</body>

</html>
