<?php
/*include "../inc/enter-attendance.php";*/
#include "../inc/enter-attendance.php";
include "../inc/connect.php";
$con=connect();
$ab='ab';


session_start();
/*$arr=operationResults();
$date=$arr[0];*/

#$result=$arr[3];
$classes=$_SESSION['classes'];
if(isset($_GET['next'])) {
    $Class=$_GET['class'];

    $Class = $Class[strlen($Class) - 1];
    $class_id=$classes[(int)$Class-1];



    $stmt=$con->prepare("SELECT FirstName,LastName,ID from person WHERE ID in (SELECT S_ID from participate WHERE Class_id=?)");
    $stmt->bind_param("s",$class_id);
    $stmt->execute();
    $result=$stmt->get_result();
    $names=array();
    $S_ID=array();
    while($row = $result->fetch_assoc()) {
        $names[] = $row['FirstName'].' '.$row['LastName'];
        $S_ID[]=$row['ID'];




    }
    $_SESSION['SID']=$S_ID;
    $_SESSION['na']=$names;

}


if(isset($_GET['Save'])){
    $date=$_GET['date'];




    $x="<script>document.writeln(Object.keys(x).length);</script>";
    echo $x;




    #echo "<script>alert('Data inserted successfully')</script>";
    #echo "<script>window.open('view-class-next-admin.php','_self') </script>";

}
$S_ID=$_SESSION['SID'];
$names=$_SESSION['na'];

?>

<!DOCTYPE html>
<html>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>View Details</title>

    <link rel="stylesheet" href="../css/demo1.css">
    <link rel="stylesheet" href="../css/main1.css">



</head>



<body>
<?php
/*
session_start();
$TYPE=$_SESSION['TYPE'];
$USER=$_SESSION['USER'];
$PASS=$_SESSION['PASS'];
$NAME=$_SESSION['NAME'];

*/?>

<header id="header">
    <!--<p ALIGN="RIGHT"> Logged in as: <?php /*echo $NAME;*/?> <a href="login.php" id="logout">(logout)</a></p>-->
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <!--  <span class="avatar"><img src="images/avatar.jpg" alt="" /></span> -->
</header>



<form class="form-details" method="get">

    <div class="form-log-in-with-email">

        <div class="form-white-background">

            <div class="form-title-row">
                <h1>Students' Attendance</h1>
            </div>
            <div class="form-row">
                <label>
                    <span>Date :</span>
                    <input type="date" name="date" autocomplete="off" required>
                </label>
            </div>
            <table style="width:100%" id="attendance">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Present</th>
                    <th>Absent</th>
                </tr>
                    <?php

                    for ($j = 0 ; $j< sizeof($names); $j++):?>
                        <tr>
                            <td><?php echo $S_ID[$j];?></td>
                            <td><?php echo $names[$j];?></td>
                            <td><input type="radio" name="<?php echo $j?>" value="True" onchange="printvalue(this,'<?php echo $S_ID[$j]?>')"
                                   /></td>

                            <td><input type="radio" name="<?php echo $j ?>" value="False " onchange="printvalue(this,'<?php echo $S_ID[$j];?>')"
                            /></td></tr>



                    <?php endfor;?>


            </table>
            <div class="form-row">
                <button type="submit" name="Save" onclick="save()"> Save</button>
            </div>
            <p ALIGN="RIGHT"> <a href="main_admin_window.php" id="goback">[Back]</a></p>
        </div>




    </div>

</form>
<script type="text/javascript">
    x={};
    function printvalue( myradio,sid) {
        //status.push("SADasd");
       /* document.write(status2);

        alert(status2.toString());*/
        //document.write(status);
        var r1=(myradio.value);
        var r2=sid;
        alert(r2);
        x[sid]=r1;
        alert(Object.keys(x).length);


        //document.write(r1);
        /*status2=status2.concat(r1).concat(' ');
        //alert(status);
        return status2;
*/
    }
  //  dataString = ??? ; // array?
    /*$.ajax({
        type: "POST",
        url: "script.php",
        data: x,
        cache: false,

        success: function(){
            alert("OK");
        }
    }*/);


//document.write(status,'fytf');
</script>




</body>
</html>
