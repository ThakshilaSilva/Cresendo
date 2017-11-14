
<?php
if (isset($_GET['get_report'])){
    $year = date('Y')+$_GET['year'];
    $month = $_GET['month'];

    include '../Inc/get_report_details.php';
    $report=get_report($year,$month);

}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>


    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>

    <title>Fee payments</title>

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/form-basic.css">

</head>

<header>
    <h1>CRESCENDO MUSIC ACADEMY</h1>

</header>

<ul>
</ul>


<div class="main-content">

    <form class="form-basic" method="get" action="#">
        <div class="form-title-row">
            <h1>Salary Report</h1>
        </div>
        <div class="form-row">
            <span><?php ?></span>
        </div>
        <div class="form-row">
            <table border="=1" cellspacing="0"  width="100%">
                <tr>
                    <th align="center">ID</th>
                    <th align="center">Name</th>
                    <th align="center">Salary</th>

                </tr>
                <tbody>
                <?php
                $total=[];
                if($report){
                    while ($row1=mysqli_fetch_array($report)){
                        echo "<tr>";
                        echo "<td align='center'>".$row1['ID']."</td>";
                        echo "<td align='center'>".$row1['FirstName']." ".$row1['LastName']."</td>";
                        echo "<td align='center'>".$row1['Amount']."</td>";
                        $total[]=$row1['Amount'];
                    }
                }
                ?>
                </tbody>
            </table>

        </div>
        <?php
        $amount=0.00;
        for($i=0;$i<sizeof($total);$i++){
            $amount+=$total[$i];
        }
        echo "Total Salary : ".$amount.".00";
        ?>
    </form>

</div>
</body>
</html>
