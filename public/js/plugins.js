$(document).ready(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });

    if (document.getElementById('day-chart')) {
        getStatistics('day-chart', 'day')
    } else if (document.getElementById('week-chart')) {
        getStatistics('week-chart', 'week')
    } else if (document.getElementById('month-chart')) {
        getStatistics('month-chart', 'month')
    }

    var resp = '';

    $("#getStatistics").submit(function( event ) {
        event.preventDefault();

        var form = $('#getStatistics').serialize();

        $.ajax({
            url: '/statistics/custom',
            type: 'POST',
            data: form,
            dataType: 'json',
            success: function (response) {
                resp = response;
                getChart(response, 'custom-chart', 'custom');
            }
        });
    });


    $("#due-date").AnyTime_picker(
        {
            format: "%Y-%m-%d %H:%i:%s",
            earliest: new Date(),
            
        }).removeAttr("readonly");

    $("#startDate").AnyTime_picker(
        {
            format: "%Y-%m-%d %H:%i:%s"
            
        }).removeAttr("readonly");

    $("#endDate").AnyTime_picker(
        {
            format: "%Y-%m-%d %H:%i:%s"
            // earliest: fromDay
        }).removeAttr("readonly");

});

function getStatistics(id, path) {
    $.ajax({
        url: '/statistics/' + path,
        data: 'hello',
        type: 'POST',
        success: function (response) {
            getChart(response, id, path);
        }
    });
}

function getChart(data, id, path) {

    var ctx = document.getElementById(id);
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Active', 'Checked', 'Overdue'],
            datasets: [{
                label: 'Tasks ' + path,
                data: [data['active'], data['checked'], data['overdue']],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255,99,132,1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            }
        }
    });
}
