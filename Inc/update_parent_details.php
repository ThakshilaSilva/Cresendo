<?php
include '../php/connect.php';
function update($p_id,$pfname,$plname,$prelation,$paddress,$pprovince,$pcity,$ptp1,$ptp2,$tp1,$tp2){
    try {
        $con = connect();
        mysqli_autocommit($con, false);
        $sql1 = "UPDATE parent SET FirstName=?, LastName=?, Relation=?, Address=?, Province=?, City=? WHERE Parent_id=?";

        $stmt = $con->prepare($sql1);
        $stmt->bind_param('sssssss', $pfname, $plname, $prelation, $paddress, $pprovince, $pcity, $p_id);
        $stmt->execute();

        if ($stmt->errno) {
            $message="Error during updating!";
        }
        else $message="Successfully Updated!";

        $stmt->close();

        $sql2 = "UPDATE parent_tel_numbers SET TP=? WHERE ID=? and TP=?";

        $stmt2 = $con->prepare($sql2);
        $stmt2->bind_param('sss',$ptp1, $p_id,$tp1);
        $stmt2->execute();

        if ($stmt2->errno) {
            $message="Error during updating!";
        }
        else $message="Successfully Updated!";

        $stmt2->close();

        $sql3 = "UPDATE tel_numbers SET TP=? WHERE ID=? and TP=?";

        $stmt3 = $con->prepare($sql3);
        $stmt3->bind_param('sss',$ptp2, $p_id,$tp2);
        $stmt3->execute();

        if ($stmt3->errno) {
            $message="Error during updating!";
        }
        else $message="Successfully Updated!";

        $stmt3->close();
        mysqli_autocommit($con, true);
        $con->close();
        return $message;
    }catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    }

}
?>