
<?php
function connect($type)
{
    $pass='';
    if ($type=='A'){
        $pass='uomcse1';
    }elseif ($type=='B'){
        $pass='uomcse2';
    }
    define('DB_HOST1', 'localhost');
    define('DB_NAME1', 'db_group');
    define('DB_USER1',$type);
    define('DB_PASSWORD1',$pass);
    $con=mysqli_connect(DB_HOST1,DB_USER1,DB_PASSWORD1) or die("Failed to connect to MySQL: " . mysqli_error());
    $db=mysqli_select_db($con,DB_NAME1) or die("Failed to connect to MySQL: " . mysqli_error());
    return $con;
}

?>