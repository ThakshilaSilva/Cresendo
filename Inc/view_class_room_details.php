<?php
include "connect.php";


function getClassRoom(){

    $con=connect();

    if(isset($_GET['submit'])) {

        $r_id = $_GET['class1'];

        $query = "SELECT Term,Year,Class_type,Active,Title,Date, Start_time,End_time, Teacher_id from extend_class where Class_room_id='$r_id'";
        $result = mysqli_query($con, $query);

        #$arr=array($r_id,$result);

        return $result;
    }}
?>
