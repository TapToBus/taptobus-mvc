const ctx11 = document.getElementById('admin-doughnut');

  new Chart(ctx11, {
    type: 'doughnut',
    data: {
      labels: ['Passengers', 'Buses', 'Bus Owners', 'Bus Drivers', 'Bus Conductors'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2],
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