<?php
function getclass($id){
    define('HOST', 'localhost');
    define('NAME', 'db_group');
    define('USER','root');
    define('PASSWORD','');
    $year=date('Y');
    $con1=mysqli_connect(HOST,USER,PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
    $db=mysqli_select_db($con1,NAME) or die("Failed to connect to MySQL: " . mysqli_error());
    $query = mysqli_query($con1, "select Year,Term,Title,Date,Start_time,End_time from stu_class where S_ID='$id' AND Year='$year'");
    if (!$query) {
        die("database query failed." . mysqli_error($con1));
    }
    return $query;
}
?>