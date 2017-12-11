<?php
if (isset($_GET['edit_profile'])){
    $student = $_GET['student'];
    $split_class=explode(" ",$student);
    $id= $split_class[2];
    session_start();
    $_SESSION['id']=$id;
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

</head>

<header>
    <h1>CRESCENDO MUSIC ACADEMY</h1>

</header>

<div class="main-content">
    <div class="wrap-form">
        <span>Student : <?php echo htmlspecialchars($student)?></span>
        <div class="wrap">
            <a href="edit_student_detail.php" class="button">Student Details</a>
            <a href="edit_parent_detail.php" class="button2">Parent Details</a>
            <a href="edit_sibling_details.php" class="button2">Sibling Details</a>
        </div>
    </div>




</div>
</body>
</html>



