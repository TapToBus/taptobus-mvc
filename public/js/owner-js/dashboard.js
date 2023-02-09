console.log(1)
let newDate = new Date();
const weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

let date = newDate.getDate();
let day = weekday[newDate.getDay()];
let month = newDate.getMonth()+1;

var monthArray = ["January","February","March","April","May","June","July","August","September","Octomber","November","December"];
monthnew = monthArray[month-1];

document.getElementById("date").innerHTML = date;
document.getElementById("day").innerHTML = day;
document.getElementById("month").innerHTML = monthnew.substring(0,3);


var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
       type: 'pie',
       data: {
            labels: ['NB-1940', 'NB-4968', 'NC-1890','NC-4820'],
            datasets: [{
              label: '# of Votes',
              data: [16, 10,4,8],
              backgroundColor: [
                    'green',
                    '#034694',
                    '#1E90FF',
                    '#B6B6B4'
               ],
             borderColor: [
                    'green',
                    '#034694',
                    '#1E90FF',
                    '#B6B6B4'
              ],
            borderWidth: 1
    }]
},
  options: {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
      display: true,
      position: 'bottom'
}
}
});




