<?php
if (isset($_GET['pay'])) {
    session_start();
    $last_month=$_SESSION['last'];
    $amount=$_SESSION['amount'];
    $id=$_SESSION['id'];
    $Class_id=$_SESSION['Class_id'];
    $month=$_SESSION['month'];
    $type=$_SESSION['type'];
    if($amount=="You have already paid for the class"){
        echo"<script>alert('No Payment!')</script>";
        echo "<script>window.open('fee_main.php','_self')</script>";
    }else{
        include '../Inc/fee_insert.php';
        $message=fee($amount,$id,$Class_id,$month,$last_month,$type);
    }

}
?>
0