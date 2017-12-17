<?php
include "connect.php";

function operation($room_capacity){

    try {


            $id = uniqid();

            $con = connect();
            $stmt = $con->prepare("INSERT INTO Class_room(Class_room_id,Capacity) VALUES (?,?)");
            $stmt->bind_param("ss", $id, $room_capacity);
            $stmt->execute();
            $stmt->close();
            $con->close();
            echo "<script>alert('Successfully Entered new Classroom Details!')</script>";
            echo "<script>window.open('main_admin_window.php','_self')</script>";


    } catch (mysqli_sql_exception $e){
        echo "<script>alert('Error occur in connecting to the Database!')</script>";

    } catch (Exception $e){
        echo "<script>alert('Please Enter Data Correctly!')</script>";
    }





}
?>