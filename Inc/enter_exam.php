<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'db_group');
define('DB_USER','root');
define('DB_PASSWORD','');

function findExamTitle($class_id){

    $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
    $db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());

    $count = 0;
    $stmt2 = $con->prepare("SELECT Count(Exam_Title) FROM exam WHERE Class_id=?");
    $stmt2->bind_param("s",$class_id);
    $stmt2->execute();
    $stmt2->bind_result($count);
    $stmt2->fetch();
    $stmt2->close();

    $Exam_Title='';
    $state=true;
    if ($count == 0) {
        $Exam_Title='Exam-1';

    } elseif ($count == 1) {
        $Exam_Title='Exam-2';

    } elseif ($count == 2) {
        $Exam_Title='Exam-Final';

    }elseif($count>=3){
        echo "<script>alert('All the marks are already entered')</script>";
        $state=false;
    }

    $arr=array($state,$Exam_Title);

    return $arr;
    $con->close();

}

function operationInsert($class_id,$date){

    $arr=findExamTitle($class_id);

    $state=$arr[0];
    $Exam_Title=$arr[1];

    if($state){
        $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
        $db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());

        $stmt = $con->prepare("INSERT INTO exam (Exam_id,Class_id,Exam_Title,Date) VALUES (NULL , ?, ?, ?)");
        $stmt->bind_param("sss", $class_id,$Exam_Title, $date);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Exam details entered successfully')</script>";

        $con->close();
    }

}


?>
