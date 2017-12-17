<?php

include "../inc/connect.php";
$con=connect();
session_start();
$TYPE=$_SESSION['TYPE'];
$USER=$_SESSION['USER'];
$PASS=$_SESSION['PASS'];
$NAME=$_SESSION['NAME'];



if((time()-$_SESSION['LOGIN_TIME'])>1200){
    echo"<script>alert('Session Timed out!')</script>";
    echo "<script>window.open('login.php','_self')</script>";
}

$_SESSION['LOGIN_TIME']=time();
$Teacher_id=$USER;


if(isset($_GET['next'])){

    $classes=$_SESSION['class'];

    $class=$_GET['class'];

    $Class_id = $classes[(int)$class[strlen($class) - 1]-1];
    $_SESSION['classid']=$Class_id;


}

$stmt=$con->prepare("SELECT FirstName,LastName,S_ID FROM participate NATURAL JOIN person WHERE Class_id=? AND participate.S_ID=Person.ID;");
$stmt->bind_param("s",$Class_id);
$stmt->execute();
$result=$stmt->get_result();
$names=array();

while($row = $result->fetch_assoc()) {
    $names[] = $row['FirstName'].' '.$row['LastName'].' '.$row['S_ID'];
}
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
    <p ALIGN="RIGHT"> Logged in as: <?php echo $NAME;?> <a href="login.php" id="logout">(logout)</a></p>
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <span class="avatar"><img src="../img/logo.jpg" alt="" /></span>
</header>


<form class="view class" method="get" action="#">



    <div class="form-log-in-with-email">

        <div class="form-white-background">

            <div class="form-title-row">
                <h1>Select a Class</h1>
            </div>
            <div class="form-row">
                <label>
                    <span>Student Name :</span>
                    <input type="=text" list="names" name="name" id="name" autocomplete="off" required/>
                    <datalist id="names">
                        <?php for ($j = 0 ; $j< sizeof($names); $j++):?>
                            <option> <?php echo $names[$j];?></option>


                        <?php endfor;?>

                    </datalist>

                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Date :</span>
                    <input type="date" name="date" autocomplete="off" required>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>State:</span>
                    <select name="attendance">
                        <option name="attendance" value="True">Present</option>
                        <option name="attendance"value="False">Absent</option>

                    </select>

                </label>
            </div>

            <div class="form-row">
                <button type="submit" name="next1"> Save</button>
            </div>
            <p ALIGN="RIGHT"> <a href="select-class-admin.php" id="goback">[Back]</a></p>


        </div>


    </div>

</form>
<?php
if(isset($_GET['next1'])){



    $date=$_GET['date'];
    $Class_id=$_SESSION['classid'];
    $Sheet_Id=(int)substr($date, 0, 4).substr($date, 5, 2).substr($date, 8, 2).$Class_id;

    $state = ($_GET['attendance']);

    $State = $state === 'True'? true: false;


    $sid=$_GET['name'];
    $S_ID=substr($sid, -7);

    $stmt1 = $con->prepare("INSERT INTO SAttendance_sheet(Attendance_sheet_id, Class_id, Date) VALUES (?, ?, ?)");
    $stmt1->bind_param("sss", $Sheet_Id, $Class_id,$date);
    $result1=$stmt1->execute();
    $stmt1->close();

    $stmt2 = $con->prepare("INSERT INTO SAttendance(Attendance_sheet_id,S_ID,State) VALUES (?, ?, ?)");
    $stmt2->bind_param("sss", $Sheet_Id, $S_ID,$State);
    $result1=$stmt2->execute();
    $stmt2->close();

    echo"<script>alert('Mark Attendance Successfully')</script>";


    //$Class_id = $classes[(int)$class[strlen($class) - 1]-1];


}
?>

</body>

</html>
