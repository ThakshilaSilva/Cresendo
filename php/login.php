<?php
include "../inc/login.php";

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/main.css">
</head>




<body>


<header id="header">
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <!--  <span class="avatar"><img src="images/avatar.jpg" alt="" /></span> -->
</header>

<!-- You only need this form and the form-login.css -->

<form class="form-details" method="post" action="#">

    <div class="form-log-in-with-email">

        <div class="form-white-background">

            <div class="form-title-row">
                <h1>Log in</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>User Name</span>
                    <input type="text" name="username" required>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Password</span>
                    <input type="password" name="password" required>
                </label>
            </div>

            <div class="form-row">
                <button type="submit" name="login">Log in</button>
            </div>

        </div>



    </div>

</form>
<?php
if (isset($_POST['login'])){
    $user=$_POST['username'];
    $pass=($_POST['password']);
    operation($user,$pass);




}

?>



</body>

</html>
