<!DOCTYPE html>

<html>
<head>

<style type="text/css">
	#container {
	min-width: 310px;
	max-width: 800px;
	height: 400px;
	margin: 0 auto
}
</style>
	
</head>





<body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container"></div>



</body>

<script type="text/javascript">
	Highcharts.chart('container', {

    title: {
        text: 'Envio de Emails '
    },

    subtitle: {
        text: 'Dados correspondentes a 7 dias'
    },

    yAxis: {
        title: {
            text: 'Valores'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            pointStart: 0
        }
    },

    series: [{
        name: 'Apresentação',
        data: [1, 2, 1, 3, 1, 5, 2]
    }, {
        name: 'Proposta',
        data: [100000, 200000, 100000, 200000, 500000, 500000, 250000]
    }]

});
</script>



</html>