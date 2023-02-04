<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $dataPoints = array(
        array("y" => 25, "label" => "Sunday"),
        array("y" => 15, "label" => "Monday"),
        array("y" => 25, "label" => "Tuesday"),
        array("y" => 5, "label" => "Wednesday"),
        array("y" => 10, "label" => "Thursday"),
        array("y" => 0, "label" => "Friday"),
        array("y" => 20, "label" => "Saturday")
    );

    ?>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Push-ups Over a Week"
                },
                axisY: {
                    title: "Number of Push-ups"
                },
                data: [{
                    type: "line",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>