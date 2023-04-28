var ctx2 = document.getElementById('doughnut').getContext('2d');
var myChart2 = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ['Owners', 'Drivers', 'Conductors'],

        datasets: [{
            label: 'Users',
            data: [21, 42, 68, 45],
            backgroundColor: [
                '#1e0e5e',
                '#60519d',
                '#390ee6'
                

            ],
            borderColor: [
                '#1e0e5e',
                '#60519d',
                '#390ee6'
                
            ],
            borderWidth: 1
        }]

    },
    options: {
        responsive: true
    }

});