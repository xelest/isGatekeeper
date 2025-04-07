
var trafficchart = document.getElementById("trafficflow");
var saleschart = document.getElementById("sales");

var myChart1 = new Chart(trafficchart, {
    type: 'line',
    data: {
            labels: ['7AM','8AM','9AM','10AM','11AM','12NN','1PM','2PM','3PM','4PM','5PM','6PM','7PM','8PM'],
            datasets: [{
                backgroundColor: "rgba(48, 164, 255, 0.5)",
                borderColor: "rgba(48, 164, 255, 0.8)",
                data: ['1135', '1135', '1140','1168', '1150', '1145','1155', '1155', '1150','1160', '1185', '1190','1180','1200'],
                label: '',
                fill: true
            }]
    },
    options: {
        responsive: true,
        title: {display: false,text: 'Chart'},
        legend: {position: 'top',display: false,},
        tooltips: {mode: 'index',intersect: false,},
        hover: {mode: 'nearest',intersect: true},
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Timeline'
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Traffic'
                }
            }]
        }
    }
});

var myChart2 = new Chart(saleschart, {
    type: 'bar',
    data: {
        labels: ['7AM','8AM','9AM','10AM','11AM','12NN','1PM','2PM','3PM','4PM','5PM','6PM','7PM','8PM'],
        datasets: [{
            label: 'Income',
            backgroundColor: "rgba(76, 175, 80, 0.5)",
            borderColor: "#6da252",
            borderWidth: 1,
            data: ["280","300","400","600","450","400","500","550","450","650","950","1000","940","720"],
        }]
    },
    options: {
        responsive: true,
        title: {display: false,text: 'Chart'},
        legend: {position: 'top',display: false,},
        tooltips: {mode: 'index',intersect: false,},
        hover: {mode: 'nearest',intersect: true},
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Timeline'
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Traffic'
                }
            }]
        }
    }
});