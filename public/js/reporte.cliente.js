$(document).ready(function() {
   array_data = [];
   $.each(data_js, function(index, obj) {
      array_data.push({
         name : obj.cliente,
         y : parseFloat(obj.total)
      });
   });

   Highcharts.chart('char', {
      chart: {
            type: 'column'
        },
        title: {
            text: 'Clientes frecuentes'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'N° de consultas'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: ''
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b><br/>'
        },

        series: [{
            name: 'Cliente',
            colorByPoint: true,
            data: array_data
        }]
   });
});