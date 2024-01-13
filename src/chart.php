<script>
    window.onload = function () {
        var data_json = <?php echo json_encode($data, JSON_PRETTY_PRINT); ?>;
        data_template = [{
                name: "Test-A",
                type: "spline",
                yValueFormatString: "# Sec",
                showInLegend: true,
                dataPoints: [
                ]
            },
            {
                name: "Test-B",
                type: "spline",
                yValueFormatString: "# Sec",
                showInLegend: true,
                dataPoints: [
                ]
            }];
        for (var i = 0; i < data_json.year.length; i++) {
            var temp_a = { x: new Date(data_json.year[i],data_json.month[i],data_json.day[i]), y: parseFloat(data_json.time_A_arr[i]) };
            var temp_b = { x: new Date(data_json.year[i],data_json.month[i],data_json.day[i]), y: parseFloat(data_json.time_B_arr[i]) };
            data_template[0].dataPoints.push(temp_a);
            data_template[1].dataPoints.push(temp_b);
        }
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title:{
                text: "Test History"
            },
            axisX: {
                valueFormatString: "DD MMM,YY"
            },
            axisY: {
                title: "Time Taken(in seconds)",
                includeZero: false,
                suffix: "secs"
            },
            legend:{
                cursor: "pointer",
                fontSize: 16,
                itemclick: toggleDataSeries
            },
            toolTip:{
                shared: true
            },
            data: data_template
        });
//         According to the TMT directions for administration, an average score for the TMT Part A is 29 seconds and a deficient score is greater than 78 seconds.

// For the TMT Part B, an average score is 75 seconds and a deficient score is greater than 273 seconds.
        //Error Chart
        
        var data_json = <?php echo json_encode($data, JSON_PRETTY_PRINT); ?>;
        data_template = [{
                name: "Test-A",
                type: "spline",
                yValueFormatString: "# ",
                showInLegend: true,
                dataPoints: [
                ]
            },
            {
                name: "Test-B",
                type: "spline",
                yValueFormatString: "# ",
                showInLegend: true,
                dataPoints: [
                ]
            }];
        for (var i = 0; i < data_json.year.length; i++) {
            var temp_a = { x: new Date(data_json.year[i],data_json.month[i],data_json.day[i]), y: parseFloat(data_json.error_A[i]) };
            var temp_b = { x: new Date(data_json.year[i],data_json.month[i],data_json.day[i]), y: parseFloat(data_json.error_B[i]) };
            data_template[0].dataPoints.push(temp_a);
            data_template[1].dataPoints.push(temp_b);
        }
        var chart1 = new CanvasJS.Chart("chartContainer1", {
            animationEnabled: true,
            title:{
                text: "Error Count"
            },
            axisX: {
                valueFormatString: "DD MMM,YY"
            },
            axisY: {
                title: "Number of times",
                includeZero: false,
                suffix: ""
            },
            legend:{
                cursor: "pointer",
                fontSize: 16,
                itemclick: toggleDataSeries
            },
            toolTip:{
                shared: true
            },
            data: data_template
        });

        chart.render();
        chart1.render();
        function toggleDataSeries(e){
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            }
            else{
                e.dataSeries.visible = true;
            }
            chart.render();
        }
    }

</script>