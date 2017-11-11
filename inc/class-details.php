<?php
include "connect.php";
#$con=connect();

function operationResults(){
    $con=connect();


    if(isset($_GET['View_Details'])) {

        $Class = $_GET['class'];

        $Class = $Class[strlen($Class) - 1];
        session_start();
        $Instrument = $_SESSION['instrument'];
        $Term = $_SESSION['Term'];
        $Year = $_SESSION['Year'];
        $classes = $_SESSION['class'];
        $ClassID = $classes[$Class - 1];


        $stmt1 = $con->prepare('select FirstName,LastName from person where ID in(select Teacher_id from conduct where Class_id=?)');
        $stmt1->bind_param("s",$ClassID);
        $stmt1->execute();
        $result=$stmt1->get_result();
        $row1=$result->fetch_assoc();
        $stmt1->close();


        $stmt2 = $con->prepare('select COUNT(S_ID)from participate where Class_id=?');
        $stmt2->bind_param("s",$ClassID);
        $stmt2->execute();
        $result=$stmt2->get_result();
        $row2=$result->fetch_assoc();
        $stmt2->close();

        $stmt3 = $con->prepare('select Capacity from class_room where Class_room_id in(select Class_room_id from class WHERE Class_id=?)');
        $stmt3->bind_param("s",$ClassID);
        $stmt3->execute();
        $result=$stmt3->get_result();
        $row3=$result->fetch_assoc();
        $stmt3->close();

        $stmt4 = $con->prepare('select Active,Class_Type from class where Class_id=?');
        $stmt4->bind_param("s",$ClassID);
        $stmt4->execute();
        $result=$stmt4->get_result();
        $row4=$result->fetch_assoc();
        $stmt4->close();
    }



        $arr=array($Instrument,$Term,$Year,$row1,$row2,$row3,$row4);

        return $arr;
}
        ?>