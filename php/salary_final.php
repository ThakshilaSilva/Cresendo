<?php
if (isset($_GET['settle'])) {
    session_start();
    $id=$_SESSION['id'];
    $salary=$_SESSION['salary'];
    $year=$_SESSION['year'];
    $month=$_SESSION['month'];
    include '../Inc/pay_salary.php';
    pay($id,$salary,$year,$month);
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/form-basic.css">
    <link rel="stylesheet" href="../css/new.css">
    <link rel="stylesheet" href="../css/main.css">

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>

</head>

<header>
    <h1>CRESCENDO MUSIC ACADEMY</h1>

</header>

<div class="main-content">
    <div class="wrap-form">
        <div class="wrap">

        </div>
    </div>
</div>
</body>
</html>
