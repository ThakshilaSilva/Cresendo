<?php
session_start();
$id=$_SESSION['t_id'];

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

    <form class="form-basic" method="get" action="#">
        <div class="form-row">
            <span>ID: <?php echo htmlspecialchars($id)?></span>
        </div>
        <div class="form-row">
            <label>
                <span>New Password</span>
                <input type="password" name="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" oninvalid="this.setCustomValidity('Not Valid!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Confirm Password</span>
                <input type="password" name="password2"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"oninvalid="this.setCustomValidity('Not Valid!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="f" id="message">

            <span>Password must contain:</span>
            <span id="letter" class="invalid">A <b>lowercase</b> letter</span>
            <span id="capital" class="invalid">A <b>capital (uppercase)</b> letter</span>
            <span id="number" class="invalid">A <b>number</b></span>
            <span id="length" class="invalid">Minimum <b>8 characters</b></span>
        </div>
        <div class="form-row">
            <button type="submit" name="reset">Confirm</button>
        </div>
    </form>

</div>
</body>
<script>
    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }
</script>
</html>

<?php
if (isset($_GET['reset'])){
    $pass1=$_GET['password1'];
    $pass2=$_GET['password2'];
    include '../inc/t_reset_password.php';
    check_validity($id,$pass1,$pass2);

}

?>

