<?php
include '../php/connect.php';
function get_sibling_details($id){
    try {
        $con = connect();

        #sibling details
        $query = mysqli_query($con, "select FirstName,LastName,ID from person where ID in (select sib_ID from sibling where s_ID='$id')");
        if (!$query) {
            die("database query failed." . mysqli_error($con));
        }

        $sibs = [];
        while ($sib = $query->fetch_array()) {
            $sibs[] = $sib["FirstName"];
            $sibs[] = $sib["LastName"];
            $sibs[] = $sib["ID"];

        }
        $con->close();
        return $sibs;

    }catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    }

}
?>