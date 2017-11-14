<?php
include '../php/connect.php';
function confirm($id,$pass){
    try {
        $con = connect();

        $query = mysqli_query($con, "select AES_DECRYPT(password,'music') as password from user where U_ID='$id'");
        if (!$query) {
            die("database query failed." . mysqli_error($con));
        }
        $result = $query->fetch_array();
        $password = $result["password"];
        if($pass==$password){
            echo "<script>window.open('t_new_password.php','_self')</script>";
        }else{
            echo"<script>alert('Password is wrong!')</script>";
            exit();

        }

    }catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    }

}
?>