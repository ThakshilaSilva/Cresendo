<?php
include "connect.php";

function operation($name1,$class){
    try {
        $con = connect();
        $id = substr($name1, strrpos($name1, " ") + 1);

        $split_class = explode(" ", $class);

        $instrument = $split_class[0];
        $stmt = $con->prepare("SELECT Instrument_id from instrument WHERE Title=?");
        $stmt->bind_param("s", $instrument);
        $stmt->execute();
        $stmt->bind_result($Instrument_id);
        $stmt->fetch();
        $stmt->close();

        #get the details of the class.

        $year = $split_class[4];
        $term = $split_class[6];
        $Class_id = $split_class[8];


        #check whether student has payed for the class.
        $fee_id = "";
        $stmt2 = $con->prepare("SELECT Fee_id FROM Fee WHERE Student_id=? AND Class_id = ? AND Year=? AND Term=? AND Instrument_id=?");
        $stmt2->bind_param("sssss", $id, $Class_id, $year, $term, $Instrument_id);
        $stmt2->execute();
        $stmt2->bind_result($fee_id);
        $stmt2->fetch();
        $stmt2->close();
        #Check whether student has already registered.

        $count = 0;
        $stmt3 = $con->prepare("SELECT Count(Student_id) FROM participate WHERE Student_id=? AND Instrument_id=? AND Class_id=? AND Year =? AND Term=?");
        $stmt3->bind_param("sssss", $id, $Instrument_id, $Class_id, $year, $term);
        $stmt3->execute();
        $stmt3->bind_result($count);
        $stmt3->fetch();
        $stmt3->close();


        if ($fee_id == "") {
            echo "<script>alert('Please Complete the Payment for the class!')</script>";
            echo "<script>window.open('main_admin_window.php','_self')</script>";

        } elseif ($count == 1) {
            echo "<script>alert('Student has already Registered for this class!')</script>";
            echo "<script>window.open('main_admin_window.php','_self')</script>";

        } else {
            $stmt1 = $con->prepare("INSERT INTO participate(Student_id,Instrument_id,Class_id,Year,Term) VALUES (?, ?, ?, ?, ?)");
            $stmt1->bind_param("sssss", $id, $Instrument_id, $Class_id, $year, $term);
            $stmt1->execute();
            $stmt1->close();
            $con->close();
            echo "<script>alert('Registered to the class Successfully!')</script>";
            echo "<script>window.open('main_admin_window.php','_self')</script>";
        }
    }catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    } catch (Exception $e){
        echo "<script>alert('Enter Valid Inputs!')</script>";
    }
}
?>