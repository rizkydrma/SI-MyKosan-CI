let ctx = document.getElementById('chartPendapatan').getContext('2d');
let data_jumlah = [];
    $.post(`dashboard/chartPendapatan` , function(data){
        let obj = JSON.parse(data);
        $.each(obj, function(test, item){
        if(item[0].jumlah == null){
            item[0].jumlah = 0;
        }
        data_jumlah.push(item[0].jumlah);
        });
    
	let myChart = new Chart(ctx, {
		type: 'line',
		data: {	
			labels: ['JAN','FEB','MARET','APRIL','MEI','JUNI','JULI','AGT','SEP','OKT','NOV','DES'],
			datasets: [{
				label: 'Jumlah Pendapatan',
				data: data_jumlah,
				backgroundColor : '##ebebeb50',
				borderColor : '#ebebeb',
				pointStyle : 'circle',
				pointBackgroundColor : '#0c2646',
				pointBorderWidth: 1,
				pointHoverRadius: 7,
				pointHoverBorderWidth: 2,
            pointRadius: 5,
				fill: true,
			}]
		},
		options: {
            title : {
            display : true,
            text: `Pendapatan pada tahun ${tahun = new Date().getFullYear()}` ,
            fontSize : 16,
            fontColor: '#fff'
        },
			layout: {
				padding: {
				left: 20,
				right: 20,
				top: 0,
            bottom: 0
            }
			},
			maintainAspectRatio: false,
			tooltips: {
            backgroundColor: '#fff',
            titleFontColor: '#333',
            bodyFontColor: '#666',
            bodySpacing: 4,
            xPadding: 12,
            mode: "nearest",
            intersect: 0,
            position: "nearest"
			},
			legend: {
            position: "bottom",
            fillStyle: "#FFF",
            display: false
			},
			scales: {
            yAxes: [{
				ticks: {
                fontColor: "rgba(255,255,255,0.4)",
                fontStyle: "bold",
                beginAtZero: true,
                maxTicksLimit: 5,
                padding: 10
				},
				gridLines: {
                drawTicks: true,
                drawBorder: false,
                display: true,
                color: "rgba(255,255,255,0.1)",
                zeroLineColor: "transparent"
            }
            }],
            xAxes: [{
				gridLines: {
                zeroLineColor: "transparent",
                display: false,
	
				},
				ticks: {
                padding: 10,
                fontColor: "rgba(255,255,255,0.4)",
                fontStyle: "bold"
            }
            }]
            }
        }
    })
})