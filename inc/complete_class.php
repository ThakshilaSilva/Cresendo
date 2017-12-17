<?php
include "connect.php";

function operation($class){
    try {
        $con = connect();
        $split_class = explode(" ", $class);


        $Class_id = $split_class[13];
        $stmt5 = $con->prepare("UPDATE Class set Active=FALSE  where Class_id=?");
            $stmt5->bind_param("s",$Class_id);
            $result5=$stmt5->execute();
            $stmt5->close();
            $con->close();
            if($result5){

                echo "<script>alert('Completed  the class Successfully!')</script>";
                echo "<script>window.open('main_admin_window.php','_self')</script>";
            } else{
                echo "<script>alert('Error Occur in Registering!!')</script>";
                echo "<script>window.open('main_admin_window.php','_self')</script>";
            }

    }catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    } catch (Exception $e){
        echo "<script>alert('Enter Valid Inputs!')</script>";
    }
}
?>