<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'db_group');
define('DB_USER','root');
define('DB_PASSWORD','');

function operationInsert($class_id){

    if($class_id!=null) {
        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
        $db = mysqli_select_db($con, DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());


        $query = "select person.ID, person.FirstName, person.LastName from participate natural join person where person.ID= participate.S_ID and participate.Class_id='$class_id'";
        $result = mysqli_query($con, $query);

        $con->close();
        return $result;
    }

}


?>
