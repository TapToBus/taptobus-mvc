const ctx10 = document.getElementById('monthly-users-line-chart');

  new Chart(ctx10, {
    type: 'line',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'Week 12', 'December'],
      datasets: [{
        label: 'Monthly New Users',
        data: [20, 19, 30, 50, 22, 31, 12, 33, 34, 14, 24, 100, 13],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });