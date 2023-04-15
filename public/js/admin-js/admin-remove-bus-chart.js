const ctx4 = document.getElementById('admin-remove-bus-chart');

  new Chart(ctx4, {
    type: 'line',
    data: {
      labels: ['January', 'February', 'March', 'April'],
      datasets: [{
        label: 'Monthly income',
        data: [12, 19, 3, 5],
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