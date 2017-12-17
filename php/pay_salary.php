
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/main.css">


    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(function() {

            //autocomplete
            $(".auto1").autocomplete({
                source: "../Inc/search_teacher.php",
                minLength: 1
            });
        });
    </script>
</head>

<header>
    <h1>CRESCENDO MUSIC ACADEMY</h1>

</header>

<div class="main-content">
    <form class="form-basic" method="get" action="view_salary.php">
        <div class="form-title-row">
            <h1>Teacher</h1>
        </div>
        <div class="form-row">
            <label>
                <span>Teacher Name :</span>
                <input type="text" name="teacher" class="auto1" />
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Year</span>
                <select name="yea">
                    <option value="-1"><?php echo (date('Y')-1)?></option>
                    <option value="0"><?php echo (date('Y'))?></option>
                    <option value="1"><?php echo (date('Y')+1)?></option>
                </select>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Month</span>
                <select name="month" >
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </label>
        </div>
        <div class="form-row">
            <button type="submit" name="view_salary" >View Salary</button>
        </div>
    </form>


</div>
</body>
</html>


