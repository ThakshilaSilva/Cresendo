
<?php
function connect($type)
{
    $pass='';
    if ($type=='A'){
        $pass='uomcse1';
    }elseif ($type=='B'){
        $pass='uomcse2';
    }
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'db_group');
    define('DB_USER',$type);
    define('DB_PASSWORD',$pass);
    $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
    $db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());
    return $con;
}

?>