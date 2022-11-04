$(document).ready(function() {
   serie_data = [];
   $.each(data_js[1], function(key, obj) {
      serie_data.push({
         name : obj.enfermedad,
         data : obj.datos
      });
   });

   Highcharts.chart('char', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Las enfermedades más comunes por distrito'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: data_js[0],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cant.'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: serie_data
   });
});
