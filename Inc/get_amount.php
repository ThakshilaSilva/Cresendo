
<?php
include "connect.php";

function amount($id,$Class_id,$month,$type){
    try{
        $con = connect();
        $query1 = mysqli_query($con, "SELECT COUNT(S_ID) as number FROM fee WHERE S_ID='$id' AND Class_id='$Class_id' AND Month='$month'");
        $result = mysqli_fetch_assoc($query1);
        $paid = $result['number'];
        #check whether payement has done before
        session_start();
        if ($paid == 1) {
            $_SESSION['last']=0;
            $amount = "You have already paid for the class";
        } else {
            mysqli_autocommit($con, false);
            #check for last Payment

            $month_query = mysqli_query($con, "SELECT Month from fee WHERE S_ID='$id' AND Class_id='$Class_id'");
            if (!$month_query) {
                die("database query failed." . mysqli_error($con));
            }
            $month_list=[];
            while ($months = $month_query->fetch_array()) {
                $month_list[] = $months["Month"];

            }
            if(sizeof($month_list)>1){
                $last_month=max($month_list);
            }else{
                $last_month=0;
            }

            if($type=='Group'){
                $type='G';
            }else{
                $type='I';
            }
            $query2 = mysqli_query($con, "select Fee_Charge from Student_charges where Class_Type='$type'");
            if (!$query2) {
                die("database query failed." . mysqli_error($con));
            }
            $_SESSION['last']=$last_month;
            $result2 = $query2->fetch_array();
            $fee=$result2["Fee_Charge"];
            if($last_month==($month-1)){
                $amount = "Amount :".$fee;
            }else {
                $product=$month-$last_month;
                $total=$fee*$product;
                if($last_month==0){
                    $amount="No payment has done before. Total amount need to pay is ".$total;
                }else{
                    $amount="Last Payment has done for month ".$last_month." , "."Total amount need to pay: ".$total;
                }

            }
        }
        return $amount;
    }catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    }catch (Exception $e){
        echo "<script>alert('Enter Valid Inputs!')</script>";
    }

}
?>