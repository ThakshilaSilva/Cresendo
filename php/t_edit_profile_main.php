<?php
    session_start();
    $t_id=$_SESSION['USER'];
    $t_name=$_SESSION['NAME'];
    $_SESSION['t_id']=$t_id;
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
        <span>Teacher : <?php echo htmlspecialchars($t_name." ".$t_id)?></span>
        <div class="wrap">
            <a href="t_edit_profile.php" class="button">Edit Details</a>
            <a href="t_reset_password.php" class="button2">Reset Password</a>
        </div>
    </div>


</div>
</body>
</html>



