<?php
include '../php/connect.php';
function update($id,$id1,$id2,$sib1,$sib2){
    try {
        $con = connect();
        mysqli_autocommit($con, false);
        if($id1!=NULL ){
            $sql1 = "UPDATE sibling SET sib_ID=? WHERE s_ID=? and sib_ID=?";

            $stmt = $con->prepare($sql1);
            $stmt->bind_param('sss',$id1,$id,$sib1);
            $stmt->execute();

            if ($stmt->errno) {
                $message="Error during updating!";
            }
            else $message="Successfully Updated!";

            $stmt->close();
        }

        if($id2!=NULL){
            $sql2 = "UPDATE sibling SET sib_ID=? WHERE s_ID=? and sib_ID=?";

            $stmt2 = $con->prepare($sql2);
            $stmt2->bind_param('sss',$id2, $id,$sib2);
            $stmt2->execute();

            if ($stmt2->errno) {
                $message="Error during updating!";
            }
            else $message="Successfully Updated!";

            $stmt2->close();
        }else{
            $message="No data is updated!";
        }

        mysqli_autocommit($con, true);
        $con->close();
        return $message;
    }catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    }

}
?>