window.onload = function () {
    var data_json = getCookie('data_json');
    var data = JSON.parse(data_json);
    this.console.log(data);
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title:{
            text: "Test Result"
        },
        axisX: {
            valueFormatString: "DD MMM,YY"
        },
        axisY: {
            title: "Time Taken(in minutes)",
            includeZero: true,
            suffix: "Mins"
        },
        legend:{
            cursor: "pointer",
            fontSize: 16,
            itemclick: toggleDataSeries
        },
        toolTip:{
            shared: true
        },
        data: [{
            name: "TMT-A",
            type: "spline",
            yValueFormatString: "# Mins",
            showInLegend: true,
            dataPoints: [
                { x: new Date(2017,6,24), y: 1 },
                { x: new Date(2018,6,25), y: 2.1 },
                { x: new Date(2019,7,26), y: 3 },
                { x: new Date(2020,8,27), y: 4 },
                { x: new Date(2021,9,28), y: 2.5 },
                { x: new Date(2022,10,29), y: 1.5 },
                { x: new Date(2023,11,30), y: 2.5 }
            ]
        },
        
        {
            name: "TMT-B",
            type: "spline",
            yValueFormatString: "# Mins",
            showInLegend: true,
            dataPoints: [
                { x: new Date(2017,6,24), y: 1 },
                { x: new Date(2018,6,25), y: 2 },
                { x: new Date(2019,6,26), y: 3.5},
                { x: new Date(2020,6,27), y: 4},
                { x: new Date(2021,6,28), y: 1.5},
                { x: new Date(2022,6,29), y: 2.4 },
                { x: new Date(2023,6,30), y: 2 }
            ]
        }]
    });
    chart.render();
    
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