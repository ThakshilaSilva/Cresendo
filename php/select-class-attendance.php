<?php

include "../inc/connect.php";
$con=connect();
session_start();
$Teacher_id='150231T';


$stmt=$con->prepare("SELECT Class_id FROM conduct WHERE Teacher_id=?");
$stmt->bind_param("s",$Teacher_id);
$stmt->execute();
$result=$stmt->get_result();
$classes=array();
while($row = $result->fetch_assoc()) {
    $classes[] = $row['Class_id'];



}
$_SESSION['classes']=$classes;
?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Select Class" content="width=device-width, initial-scale=1">

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


<form class="view class" method="get" action="enter-attendance.php">



    <div class="form-log-in-with-email">

        <div class="form-white-background">

            <div class="form-title-row">
                <h1>Select a Class</h1>
            </div>
            <div class="form-row">
                <label>
                    <span>Class</span>
                   <!-- <input type="text" list="classes" name="class" id="class" autocomplete="off" required/>-->
                    <select name="class" id="class"  required>
                        <?php

                        echo sizeof($classes);
                        for ($j = 0 ; $j< sizeof($classes); $j++):?>
                            <option> <?php echo 'class-'.($j+1);?></option>


                        <?php endfor;?>
                    </select>






                </label>
            </div>

            <div class="form-row">
                <button type="submit" name="next"> Next</button>
            </div>
            <p ALIGN="RIGHT"> <a href="select-class-admin.php" id="goback">[Back]</a></p>


        </div>


    </div>

</form>


</body>

</html>
