<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'db_group');
define('DB_USER','root');
define('DB_PASSWORD','');

function operationInsert($class_id){

    $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
    $db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());

    $query = "SELECT Exam_Title,Grade from exam NATURAL join grade where Class_id=$class_id";
    $result = mysqli_query($con, $query);

    $con->close();
    return $result;

}


?>
