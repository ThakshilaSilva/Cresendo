<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db_group');


if (isset($_GET['term'])){
    $return_arr = array();
    $date_array=["MO"=>"Monday", "TU"=>"Tuesday","WE"=>"Wednesday","TH"=>"Thursday","FR"=>"Friday" ];
    $type_array=["G"=>"Group", "I"=>"Individual" ];
    $year=date('Y');

    try {

        $conn = new PDO("mysql:host=".DB_SERVER.";port=3306;dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM extend_class WHERE Title LIKE :term ");
        $stmt->execute(array('term' => '%'.$_GET['term'].'%'));


        while($row = $stmt->fetch()) {
            if($row['Year']==$year){
                $date=$date_array[$row['Date']];
                $type=$type_array[$row['Class_Type']];
                $details=$row['Title']." ".$date." ".$row['Start_time']."pm-".$row['End_time']."pm Year= ".$row['Year']." Term= ".$row['Term']." Conducted by ".$row['FirstName']." ".$row['LastName']." ".$type." Class= ".$row['Class_id']." ";
                $return_arr[] =  $details;}
        }


    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }


    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}

?>