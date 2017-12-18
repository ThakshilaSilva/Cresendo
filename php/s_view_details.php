<?php
include '../php/connect.php';
try {
    $con = connect();
}catch (mysqli_sql_exception $e){
    echo "<script>alert('Error Occur in connecting to the Database!')</script>";
}
if (isset($_GET['view'])) {
    $student = $_GET['student'];
    $split_class=explode(" ",$student);
    $fname= $split_class[0];
    $lname=$split_class[1];
    $id= $split_class[2];
    include '../inc/get_student_detials.php';
    $details=getdetails($id,$con);
    include '../Inc/get_s_class_details.php';
    $class=getclass($id);

}
session_start();
$NAME=$_SESSION['NAME'];
if((time()-$_SESSION['LOGIN_TIME'])>1200){
    echo"<script>alert('Session Timed out!')</script>";
    echo "<script>window.open('login.php','_self')</script>";
}

$_SESSION['LOGIN_TIME']=time();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/form-basic.css">
    <link rel="stylesheet" href="../css/new.css">
    <link rel="stylesheet" href="../css/main.css">
</head>

<header>
    <p ALIGN="RIGHT"> Logged in as: <?php echo $NAME;?> <a href="login.php" id="logout">(logout)</a></p>
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>


</header>

<div class="main-content">

    <form class="form-basic" method="get" action="#">
        <div class="new">
            <div class="form-title-row">
                <h1>Personal Details</h1>
            </div>
            <div class="form-row">
                <label>First Name : <?php echo htmlspecialchars($fname)?></label>
            </div>
            <div class="form-row">
                <span>Last Name :</span>
                <label for=""><?php echo htmlspecialchars($lname)?></label>
            </div>
            <div class="form-row">
                <span>Date of Birth :</span>
                <label for=""><?php echo htmlspecialchars($details[2])?></label>
            </div>
            <div class="form-row">
                <span>Address :</span>
                <label for=""><?php echo htmlspecialchars($details[3])?></label>
            </div>
            <div class="form-row">
                <span>Province :</span>
                <?php echo htmlspecialchars($details[4])?>
            </div>
            <div class="form-row">
                <span>City :</span>
                <?php echo htmlspecialchars($details[5])?>
            </div>
            <div class="form-row">
                <span>Gender :</span>
                <?php
                if($details[6]=='M') {
                    $gender='Male';
                }else {
                    $gender = 'Female';
                }echo htmlspecialchars($gender)?>
            </div>
            <div class="form-row">
                <span>Contact No -1 :</span>
                <?php echo htmlspecialchars($details[7])?>
            </div>
            <div class="form-row">
                <span>Contact No -2 :</span>
                <?php echo htmlspecialchars($details[8])?>
            </div>
            <div class="form-title-row">
                <h1>Class Details</h1>
            </div>
            <div class="form-row">
                <table border="=1" cellspacing="0"  width="100%">
                    <tr>
                        <th align="center">Year</th>
                        <th align="center">Term</th>
                        <th align="center">Title</th>
                        <th align="center">Day</th>
                        <th align="center">Start Time</th>
                        <th align="center">End Time</th>
                    </tr>
                    <tbody>
                    <?php
                    if($class){
                        while ($row1=mysqli_fetch_array($class)){
                            if($row1['Date']=='MO'){
                                $d='Monday';
                            }elseif ($row1['Date']=='TU'){
                                $d='Tuesday';
                            }elseif ($row1['Date']=='WE'){
                                $d='Wednesday';
                            }elseif ($row1['Date']=='TH'){
                                $d='Thursday';
                            }elseif ($row1['Date']=='FR'){
                                $d='Friday';
                            }
                            echo "<tr>";
                            echo "<td align='center'>".$row1['Year']."</td>";
                            echo "<td align='center'>".$row1['Term']."</td>";
                            echo "<td align='center'>".$row1['Title']."</td>";
                            echo "<td align='center'>".$d."</td>";
                            echo "<td align='center'>".$row1['Start_time'].".00 pm"."</td>";
                            echo "<td align='center'>".$row1['End_time'].".00 pm"."</td>";
                        }
                    }
                    ?>
                    </tbody>
                </table>

            </div>
        </div>

    </form>

</div>
</body>
</html>

