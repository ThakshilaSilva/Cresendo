<?php
include '../php/connect.php';
function check_validity($id,$pass1,$pass2){
    try {
        $con = connect();
        $key='music';
        if($pass1==$pass2){
            $query = mysqli_query($con, "update user set password=AES_ENCRYPT('$pass1','music')where U_ID='$id'");
            if (!$query) {
                die("database query failed." . mysqli_error($con));
            }
            else{
                echo"<script>alert('Successfully Updated!')</script>";
            }
            echo "<script>window.open('admin_reset_password.php','_self')</script>";
        }else{
            echo"<script>alert('Passwords are not matching!')</script>";
            exit();

        }


    }catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    }

}
?>