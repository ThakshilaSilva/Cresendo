<?php
include "connect.php";


function operationResults(){



    if(isset($_GET['Save'])) {
        #$con = connect();

        #$Class = $_GET['class'];

       /* $Class = $Class[strlen($Class) - 1];
        session_start();
        $Instrument = $_SESSION['instrument'];
        $Term = $_SESSION['Term'];
        $Year = $_SESSION['Year'];
        $classes = $_SESSION['class'];
        $ClassID = $classes[$Class - 1];*/


/*$stmt1 = $con->prepare('select FirstName,LastName from person where ID in(select S_ID from participate where Class_id=?)');
$stmt1->bind_param("s", $ClassID);
$stmt1->execute();
$result = $stmt1->get_result();
$row1 = $result->fetch_assoc();
$stmt1->close();*/
$date=$_GET['date'];

}



$arr=array($date);

return $arr;
}
?>