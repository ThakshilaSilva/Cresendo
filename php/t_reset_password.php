<?php
    session_start();
    $id=$_SESSION['t_id'];
if((time()-$_SESSION['LOGIN_TIME'])>1200){
    echo"<script>alert('Session Timed out!')</script>";
    echo "<script>window.open('login.php','_self')</script>";
}
$NAME=$_SESSION['NAME'];
$_SESSION['LOGIN_TIME']=time();
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
</head>

<header>
    <p ALIGN="RIGHT"> Logged in as: <?php echo $NAME;?> <a href="login.php" id="logout">(logout)</a></p>
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <span class="avatar"><img src="../img/logo.jpg" alt="" /></span>
</header>

<div class="main-content">

    <form class="form-basic" method="get" action="#">
        <div class="form-row">
            <span>ID: <?php echo htmlspecialchars($id)?></span>
        </div>
        <div class="form-row">
            <label>
                <span>Enter Current Password</span>
                <input type="password" name="password"  oninvalid="this.setCustomValidity('Required!')" required oninput="setCustomValidity('')">
            </label>
        </div>

        <div class="form-row">
            <button type="submit" name="check">Confirm</button>
        </div>
    </form>

</div>
</body>
</html>

<?php
if (isset($_GET['check'])){
    $pass=$_GET['password'];
    include '../inc/check_password.php';
    confirm($id,$pass);

}

?>

