$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var url = window.location.origin + '/statistical';
var urlGetYear = window.location.origin + '/get-year-order';
var Month = new Array();
var Total = new Array();
var year = new Date();
var getYear = year.getFullYear();
var myChart;

$(document).ready(function() {
    chart();
    //get year order
    $.post(urlGetYear, function(result) {
        result.forEach(function(data) {
            $('#year').append(`
                <option value='` + data.year + `'>` + data.year + `</option>
            `);
        });
    });

    function removeData(chart) {
        chart.data.labels.pop();
        chart.data.datasets.forEach((dataset) => {
            dataset.data.pop();
        });
        chart.update();
    }

    $('#year').change(function() {
        $('#canvas').remove();
        $('#canvas').html('');
        removeData(myChart);
        myChart.config.data.labels.shift();
        myChart.config.data.datasets.forEach(function(dataset, datasetIndex) {
            dataset.data.shift();
        });
        window.myChart.update();

        var yearChoose = document.getElementById('year').value;
        $('#panel-body').append(`
            <canvas id='canvas' height='280' width='600'></canvas>
        `);
        chart(yearChoose);
    });
        
    function chart(year = getYear)
    {
        //chart
        $.post(url, {year: year}, function(response) {
            response.forEach(function(data) {
                Month.push(data.month);
                Total.push(data.total);
                console.log(response);
            });
            var ctx = document.getElementById('canvas').getContext('2d');
            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels:Month,
                    datasets: [
                        {
                            label: 'Total',
                            data: Total,
                            borderWidth: 1,
                            backgroundColor: 'rgba(0, 99, 132, 0.6)',
                        }],
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }],
                    }
                }
            });
        });
    }
});
