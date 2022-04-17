$.ajax({
    url: "includes/authperf.php",
    type: "GET",
    success:function(data){
        console.log(data);
        var values = {
            labels: [],
            score: [],
            name: []
        }
        values.name.push(data[0].studname);
        for(var i = 0 ; i < data.length ; i++){
            values.labels.push(data[i].lesson);
            values.score.push(data[i].percentage);
        }

        //fetching data to chart js
        const ctx = document.getElementById('myChart2').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: values.labels,
                datasets: [
                {
                    label: values.name,
                    data: values.score,
                    backgroundColor: [
                        'rgba(54, 162, 235)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }
            ]
            },
            options: {
                scales: {
                    
                    y: {
                        beginAtZero: true,
                        max: 110
                    }
                }
            }
        });
    },
    error:function(data){
        console.log(data);
    }
});