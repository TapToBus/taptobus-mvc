const ctx6 = document.getElementById('admin-bus-bar-chart');

  new Chart(ctx6, {
    type: 'bar',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'Week 12', 'December'],
      datasets: [{
        label: 'monthly new buses',
        data: [20, 19, 30, 50, 22, 31, 12, 33, 34, 14, 24, 100, 13, 23],
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