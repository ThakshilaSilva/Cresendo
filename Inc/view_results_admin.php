<?php
include "connect.php";
#$con=connect();

function operationResults(){

    $con=connect();

    if(isset($_GET['submit'])) {

        $class1 = $_GET['class1'];
        $ETitle = $_GET['ETitle'];

        $stmt2 = $con->prepare('select Exam_id from exam where Class_id=? AND Exam_Title=?');
        $stmt2->bind_param("is", $class1,$ETitle);
        $stmt2->execute();
        $stmt2->bind_result($Exam_id);
        $stmt2->fetch();
        $stmt2->close();

        $query = "SELECT Student_id,Grade from grades where Exam_id=$Exam_id";
        $result = mysqli_query($con, $query);

        $arr=array($ETitle,$result);

        return $arr;
    }}
?>
