$.ajax({
    url: "includes/auth.php",
    type: "GET",
    success:function(data){
        console.log(data);
        var values = {
            labels: [],
            failed: [],
            passed: [],
        }

        for(var i = 0 ; i < data.length ; i++){
            values.labels.push(data[i].lesson);
            values.failed.push(data[i].failed);
            values.passed.push(data[i].passed);
        }

        //fetching data to chart js
        const ctx = document.getElementById('myChart1').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: values.labels,
                datasets: [
                {
                    label: 'FAILED',
                    data: values.failed,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'PASSED',
                    data: values.passed,
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