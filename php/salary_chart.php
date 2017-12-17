<?php
    $year=date('Y');
    $month=date('m');
    include '../Inc/get_total_salary.php';
    $salary=get_total_salary($year,$month);
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


    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>

</head>
<header>
    <h1>CRESCENDO MUSIC ACADEMY</h1>
    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer1", {
                animationEnabled: true,
                theme: "light1", // "light1", "light2", "dark1", "dark2"
                title:{
                    text: "Salary Report for Last Six months"
                },
                axisY: {
                    title: "Salary(Rs)"
                },
                data: [{
                    type: "column",
                    showInLegend: true,
                    legendMarkerColor: "grey",
                    name:"Month",
                    dataPoints: [
                        { y: <?php  echo $salary[5];?>, label: "<?php echo date('F', strtotime('-5 month'))?>" },
                        { y: <?php  echo $salary[4];?>,  label: "<?php echo date('F', strtotime('-4 month'))?>" },
                        { y: <?php  echo $salary[3];?>,  label: "<?php echo date('F', strtotime('-3 month'))?>" },
                        { y: <?php  echo $salary[2];?>,  label: "<?php echo date('F', strtotime('-2 month'))?>" },
                        { y: <?php  echo $salary[1];?>,  label: "<?php echo date('F', strtotime('-1 month'))?>" },
                        { y: <?php  echo $salary[0];?>,  label: "<?php echo date("F", strtotime(date('Y-m-1')));?>" }
                    ]
                }]
            });
            chart.render();

            var chart = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                title:{
                    text: "Salary Comparison with last five months"
                },
                axisY: {
                    title: "Salary(Rs)"
                },
                legend: {
                    cursor:"pointer",
                    itemclick : toggleDataSeries
                },
                toolTip: {
                    shared: true,
                    content: toolTipFormatter
                },
                data: [
                    {
                        type: "bar",
                        showInLegend: true,
                        name: "Previous Months",
                        color: "silver",
                        dataPoints: [
                            { y: <?php  echo $salary[5];?>, label: "<?php echo date('F', strtotime('-5 month'))?>" },
                            { y: <?php  echo $salary[4];?>, label: "<?php echo date('F', strtotime('-4 month'))?>" },
                            { y: <?php  echo $salary[3];?>, label: "<?php echo date('F', strtotime('-3 month'))?>" },
                            { y: <?php  echo $salary[2];?>, label: "<?php echo date('F', strtotime('-2 month'))?>" },
                            { y: <?php  echo $salary[1];?>, label: "<?php echo date('F', strtotime('-1 month'))?>" },
                        ]
                    },
                    {
                        type: "bar",
                        showInLegend: true,
                        name: "This month",
                        color: "#A57164",
                        dataPoints: [
                            { y: <?php  echo $salary[0];?>, label: "" },
                            { y: <?php  echo $salary[0];?>, label: "" },
                            { y: <?php  echo $salary[0];?>, label: "" },
                            { y: <?php  echo $salary[0];?>, label: "" },
                            { y: <?php  echo $salary[0];?>, label: "" },
                        ]
                    }]
            });
            chart.render();

            function toolTipFormatter(e) {
                var str = "";
                var total = 0 ;
                var str3;
                var str2 ;
                for (var i = 0; i < e.entries.length; i++){
                    var str1 = "<span style= \"color:"+e.entries[i].dataSeries.color + "\">" + e.entries[i].dataSeries.name + "</span>: <strong>"+  e.entries[i].dataPoint.y + "</strong> <br/>" ;
                    total = e.entries[i].dataPoint.y + total;
                    str = str.concat(str1);
                }
                str2 = "<strong>" + e.entries[0].dataPoint.label + "</strong> <br/>";
                str3 = "<span style = \"color:Tomato\">Total: </span><strong>" + total + "</strong><br/>";
                return (str2.concat(str)).concat(str3);
            }

            function toggleDataSeries(e) {
                if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                }
                else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }

        }
    </script>

</header>

<div class="main-content">
    <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</div>
</body>
</html>
