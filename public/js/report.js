function DashboardChart() {
    var allMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var chartData = [];

    for (var i = 0; i < allMonths.length; i++) {
        chartData.push({
            name: allMonths[i],
            y: 0
        });
    }

    const path_in = "./ajax/admin/get.php";
    fetch(path_in, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "dashboardReport=''",
    }).then((response) => {
        return response.text();
    }).then((result) => {
      
        let data = JSON.parse(result);
       
        $.each(data, function (index, item) {
            var monthIndex = allMonths.indexOf(item.month);

            if (monthIndex !== -1) {
                chartData[monthIndex].y = parseInt(item.count);
            }
        });

        if (chartFaculty) {
            chartFaculty.series[0].setData(chartData);
        }
    }).catch(console.error);

    let reportTotalFaculty = document.getElementById('dashboardReport');
    if (reportTotalFaculty) {
        var chartFaculty = Highcharts.chart(reportTotalFaculty, {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'area' 
            },
            title: {
                text: '',
                align: 'left'
            },
            xAxis: {
                categories: allMonths
            },
            yAxis: {
                title: {
                    text: 'Count'
                }
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                area: { 
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y}',
                        style: {
                            color: '#006657',
                            textOutline: 'none',
                        }
                    },
                    marker: {
                        enabled: false,
                        symbol: 'circle',
                        radius: 2,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    },
                    showInLegend: false,
                   
                }
            },
            exporting: {
                enabled: false
            },
            
            series: [{
                name: 'Record',
                data: chartData,
                color: '#208765'
            }]
        });
    }
}




DashboardChart();
