
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


    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(function() {

            //autocomplete
            $(".auto1").autocomplete({
                source: "../Inc/search_student.php",
                minLength: 1
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {

            //autocomplete
            $(".auto2").autocomplete({
                source: "../Inc/search_class.php",
                minLength: 1
            });
        });
    </script>
</head>

<header>
    <h1>CRESCENDO MUSIC ACADEMY</h1>

</header>

<div class="main-content">
    <form class="form-basic" method="get" action="fee_details.php">
        <div class="form-title-row">
            <h1>Fee Payments</h1>
        </div>
        <div class="form-row">
            <label>
                <span>Student Name :</span>
                <input type="text" name="student" class="auto1" />
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Class :</span>
                <input type="text" name="class" class="auto2" />
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Month</span>
                <select name="month" >
                    <option value="1">Month1</option>
                    <option value="2">Month2</option>
                    <option value="3">Month3</option>
                    <option value="4">Month4</option>
                    <option value="5">Month5</option>
                    <option value="6">Month6</option>
                </select>
            </label>
        </div>
        <div class="form-row">
            <button type="submit" name="continue" >Continue</button>
        </div>
    </form>


</div>
</body>
</html>

