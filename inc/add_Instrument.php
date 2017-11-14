<?php
include "connect.php";

function operation($instrument_name){

    try {

        $count = 0;
        $upper = strtoupper($instrument_name);
        $con = connect();
        $stmt = $con->prepare("SELECT COUNT(Instrument_id) FROM Instrument WHERE UPPER (Title)=?");
        $stmt->bind_param("s", $upper);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
        $id = uniqid();
        if ($count == 1) {
            echo "<script>alert('Cannot complete this action as the Instrument Already Exists!')</script>";
        } else {
            $stmt = $con->prepare("INSERT INTO Instrument(Instrument_id,Title) VALUES (?,?)");
            $stmt->bind_param("ss", $id, $instrument_name);
            $stmt->execute();
            $stmt->close();
            $con->close();
            echo "<script>alert('Successfully Entered the Instrument!')</script>";
            echo "<script>window.open('main_admin_window.php','_self')</script>";
        }

    } catch (mysqli_sql_exception $e){
        echo "<script>alert('Error occur in connecting to the Database!')</script>";

    } catch (Exception $e){
        echo "<script>alert('Please Enter Data Correctly!')</script>";
    }





}
?>