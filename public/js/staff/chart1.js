var ctx = document.getElementById('lineChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'User Population',
            data: [90, 130, 135, 200, 190, 255, 279, 260, 300, 380, 375, 410],
            backgroundColor: [
                ' #3b76ce'

            ],
            borderColor: '#000',

            borderWidth: 1
        }]
    },
    options: {
        responsive: true
    }
});