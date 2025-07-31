<div>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</div>
@script
<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable(@json($chartData));

        var options = {
            title: 'Monthly Registered Users'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>
@endscript
