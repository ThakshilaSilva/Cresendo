<?php
#include "connect.php";
#$con = connect();
include "../inc/view_class_room_details.php";
?>
<?php
session_start();
$t_id=$_SESSION['USER'];
$t_name=$_SESSION['NAME'];
$_SESSION['t_id']=$t_id;
$NAME=$_SESSION['NAME'];
if((time()-$_SESSION['LOGIN_TIME'])>1200){
    echo"<script>alert('Session Timed out!')</script>";
    echo "<script>window.open('login.php','_self')</script>";
}

$_SESSION['LOGIN_TIME']=time();
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Class Room Details</title>

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

</head>
<header>
    <p ALIGN="RIGHT"> Logged in as: <?php echo $NAME;?> <a href="login.php" id="logout">(logout)</a></p>

    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <span class="avatar"><img src="../img/logo.jpg" alt="" /></span>

</header>

<body>
<div class="main-content">

    <form class="form-basic">

        <div class="form-title-row">
            <h1>Class Room Details</h1>
        </div>


        <table border="=1" cellpadding="10" width="50%" >

            <tr>
                <th>Term</th>
                <th>Year</th>

                <th>Active</th>
                <th>Title</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Teacher ID</th>

            </tr>

            <tbody>


            <?php

            $arr=getClassRoom();


            if($arr){
                while ($row = mysqli_fetch_array($arr)){

                    if($row['Date']=='MO'){
                        $d='Monday';
                    }elseif ($row['Date']=='TU'){
                        $d='Tuesday';
                    }elseif ($row['Date']=='WE'){
                        $d='Wednesday';
                    }elseif ($row['Date']=='TH'){
                        $d='Thursday';
                    }elseif ($row['Date']=='FR'){
                        $d='Friday';
                    }

                    echo "<tr>";
                    echo "<td>".$row['Term']."</td>";
                    echo "<td>".$row['Year']."</td>";
                    #echo "<td>".$row['Class_type']."</td>";
                    echo "<td>".$row['Active']."</td>";
                    echo "<td>".$row['Title']."</td>";
                    echo "<td>".$d."</td>";
                    echo "<td>".$row['Start_time']."</td>";
                    echo "<td>".$row['End_time']."</td>";
                    echo "<td>".$row['Teacher_id']."</td>";
                }
            }



            ?>

            </tbody>

        </table>

    </form>
</div>
<a href="main_admin_window.php">Go Back to Home</a>
</body>






