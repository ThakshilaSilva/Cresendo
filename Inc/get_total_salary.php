
<?php
include "connect.php";

function get_total_salary($year,$month){
    try{
        $con = connect();
        $salary_list=[];
        for($i=0;$i<6;$i++){
            if($month==1){
                $year=$year-1;
                $month=12;
            }else{
                $query1 = mysqli_query($con, "SELECT SUM(Amount) as total FROM salary WHERE Month='$month' AND Year='$year'");
                $result1 = mysqli_fetch_assoc($query1);
                $amount= $result1['total'];
                $salary_list[]=$amount;
            }
            $month=$month-1;
        }
        return $salary_list;
    }catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    }catch (Exception $e){
        echo "<script>alert('Enter Valid Inputs!')</script>";
    }

}
?>