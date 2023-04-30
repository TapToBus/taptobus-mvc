
let newDate = new Date();
const weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

let date = newDate.getDate();
let day = weekday[newDate.getDay()];
let month = newDate.getMonth() + 1;

var monthArray = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "Octomber", "November", "December"];
monthnew = monthArray[month - 1];

document.getElementById("date").innerHTML = date;
document.getElementById("day").innerHTML = day;
document.getElementById("month").innerHTML = monthnew.substring(0, 3);




// var ctx = document.getElementById('myChart').getContext('2d');
// var xValues = ['2023-02-23', '2023-02-23', '2023-02-23', '2023-02-23', '2023-02-23', '2023-02-23', '2023-02-23'];

// new Chart("myChart", {
//   type: "line",
//   data: {
//     responsive: true,
//     labels: xValues,
//     datasets: [{
//       label: 'NB-1345',
//       data: [100000, 90000, 80000, 60000, 60000, 50000, 40000],
//       borderColor: "#22a7f0",
//       fill: false
//     }, {
//       label: 'ND-1245',
//       data: [40000, 60000, 70000, 80000, 70000, 60000, 50000],
//       borderColor: "#48b5c4",
//       fill: false
//     }, {
//       label: 'NC-5345',
//       data: [50000, 50000, 50000, 50000, 55000, 90000, 65000],
//       borderColor: "#a6d75b",
//       fill: false
//     }]
//   },
//   options: {
//     legend: {
//       display: true,
//       position: 'bottom'
//     },
//     aspectRatio: 1.7
//   }
// });


// var ctx = document.getElementById('myChart').getContext('2d');
// // var xValues = ['2023-02-23', '2023-02-23', '2023-02-23', '2023-02-23', '2023-02-23', '2023-02-23', '2023-02-23'];

// new Chart("myChart", {
//   type: "line",
//   data: {
//     responsive: true,
//     labels: <?php echo json_encode(array_keys(reset($data))); ?>,
//     datasets: [{
//       label: 'NB-1345',
//       data: [100000, 90000, 80000, 60000, 60000, 50000, 40000],
//       borderColor: "#22a7f0",
//       fill: false
//     }]
//   },


//   options: {
//     legend: {
//       display: true,
//       position: 'bottom'
//     },
//     aspectRatio: 1.7
//   }
// });




