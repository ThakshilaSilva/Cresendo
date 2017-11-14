
<?php
include "connect.php";

function get_salary($id,$year,$month){
    try{
        $con = connect();
        if($month<7){
            $term='1';
        }else{
            $term='2';
        }
        $query1 = mysqli_query($con, "SELECT COUNT(T_ID) as number FROM salary WHERE T_ID='$id' AND Month='$month' AND Year='$year'");
        $result = mysqli_fetch_assoc($query1);
        $paid = $result['number'];
        #check whether payement has done before
        if ($paid == 1) {
            $amount = "Salary is already paid for this month. ";
            echo "<script>alert('Salary is already paid for this month.')</script>";
            echo "<script>window.open('salary_main.php','_self')</script>";
        } else {
            mysqli_autocommit($con, false);
            #check for last Payment

            $class_query = mysqli_query($con, "SELECT SUM(Teacher_Charge) as salary from class_charge WHERE Teacher_id='$id' AND Term='$term'");
            if (!$class_query) {
                die("database query failed." . mysqli_error($con));
            }
            $result1 = mysqli_fetch_assoc($class_query);
            $amount= $result1['salary'];
        }
        return $amount;
    }catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    }catch (Exception $e){
        echo "<script>alert('Enter Valid Inputs!')</script>";
    }

}
?>