<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'db_group');
define('DB_USER','root');
define('DB_PASSWORD','');

function findExamID($class_id,$exam_title,$teacher_id){
    $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
    $db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());

    $stmt1 = $con->prepare("SELECT Teacher_id FROM conduct WHERE Class_id=?");
    $stmt1->bind_param("s",$class_id);
    $stmt1->execute();
    $stmt1->bind_result($teacher);
    $stmt1->fetch();
    $stmt1->close();

    if($teacher == $teacher_id) {


        $stmt = $con->prepare("SELECT Exam_id from exam WHERE Class_id=? and Exam_Title=?");
        $stmt->bind_param("is", $class_id, $exam_title);
        $stmt->execute();
        $stmt->bind_result($E_ID);
        $stmt->fetch();


        return $E_ID;
        $con->close();

    }else{
        echo "<script>alert('Unauthorized class!!! ')</script>";
    }
}

function operationInsert($s_id,$grade,$class_id,$exam_title,$teacher_id){

    $E_ID=findExamID($class_id,$exam_title,$teacher_id);

    if($E_ID!=0){

        $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
        $db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());

        $stmt = $con->prepare("INSERT INTO grades (Student_id,Exam_id,Grade) VALUES (?,?,?)");
        $stmt->bind_param("sii", $s_id,$E_ID, $grade);
        $stmt->execute();

        if($stmt->errno){
            echo "<script>alert('Error !!!')</script>";
        }else {
            echo "<script>alert('Marks entered successfully !!!')</script>";
        }
        $stmt->close();
        $con->close();
    }else{
        echo "<script>alert('Error : Please enter exam details first !!!')</script>";
    }

}


?>
