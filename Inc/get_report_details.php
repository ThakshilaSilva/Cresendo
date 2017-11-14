
<?php
include "connect.php";

function get_report($year,$month){
    try{
        $con = connect();
        $query1 = mysqli_query($con, "SELECT ID,FirstName,LastName,Amount FROM salary NATURAL JOIN person WHERE salary.T_ID=person.ID AND Month='$month' AND Year='$year'");
        return $query1;
    }catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    }catch (Exception $e){
        echo "<script>alert('Enter Valid Inputs!')</script>";
    }

}
?>