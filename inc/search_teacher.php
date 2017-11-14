<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db_group');


if (isset($_GET['term'])){
    $return_arr = array();

    try {
        $conn = new PDO("mysql:host=".DB_SERVER.";port=3306;dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare('SELECT * FROM person  JOIN teacher ON person.ID=teacher.T_ID WHERE (FirstName LIKE :term OR LastName LIKE :term)');
        $stmt->execute(array('term' => '%'.$_GET['term'].'%'));


        while($row = $stmt->fetch()) {
            $details=$row['FirstName']." ".$row['LastName']." ".$row['ID'];
            $return_arr[] =  $details;
        }


    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }


    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}

?>