$(document).ready(function () {

	$('.adminPopup').on('click', function () {
		const id = $(this).data('id');
		const modal = $(this).data('modal');
		const nama = $(this).data('nama');


		if (modal == 'detailPemilik') {
			let tabel = 'Pemilik';
			$.ajax({
				url: 'http://localhost/app/MyKosan/admin/detail/' + tabel,
				data: {
					id: id
				},
				method: 'POST',
				dataType: 'json',
				success: function (data) {
					$('#id_pemilik').html(data.id_pemilik)
					$('#nama_pemilik').val(data.nama_pemilik)
					$('#email').val(data.email)
					$('#tgl_lahir').val(data.tgl_lahir)
					$('#no_telpon').val(data.no_telp)
					$('#alamats').val(data.alamat)
					$('.gambar').attr('src', `http://localhost/app/MyKosan/assets/images/user/${data.gambar}`)
					$('#gambar').val(data.gambar)

					if (data.is_active == 1) {
						$('#is_active').val('active')
					} else {
						$('#is_active').val('not active')

					}
				}
			})
		} else if (modal == 'detailUser') {
			let tabel = 'User';
			$.ajax({
				url: 'http://localhost/app/MyKosan/admin/detail/' + tabel,
				data: {
					id: id
				},
				method: 'POST',
				dataType: 'json',
				success: function (data) {
					$('#id_user').html(data.id_user)
					$('#nama_user').val(data.nama_user)
					$('#email').val(data.email)
					$('#tgl_lahir').val(data.tgl_lahir)
					$('#no_telp').val(data.no_telp)
					$('#alamats').val(data.alamat)
					$('.gambar').attr('src', `http://localhost/app/MyKosan/assets/images/user/users/${data.gambar}`)
					$('#gambar').val(data.gambar)

					if (data.is_active == 1) {
						$('#is_active').val('active')
					} else {
						$('#is_active').val('not active')

					}
				}

			})
		} else if (modal == 'detailKosan') {
			let tabel = 'Kosan';
			$.ajax({
				url: 'http://localhost/app/MyKosan/admin/detail/' + tabel,
				data: {
					id: id
				},
				method: 'POST',
				dataType: 'json',
				success: function (data) {
					$('#id_kosan').html(data.id_kosan)
					$('.nama-kosan').html(data.nama_kosan)
					$('#nama_pemilik').val(data.nama_pemilik)
					$('#provinsis').val(data.provinsi)
					$('#kota').val(data.kota)
					$('#kecamatan').val(data.kecamatan)
					$('#alamats').val(data.alamat)
					$('#deskripsis').val(data.deskripsi)
				}

			})
		}else if (modal == "lihat_kosan_admin") {
			$('.modal-footer button[type=submit]').hide();
			$.ajax({
				url: 'http://localhost/app/MyKosan/admin/lihat_gambar/' + id,
				data: {
					id: id
				},
				method: 'POST',
				dataType: 'json',
				success: function (data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<div class="col"><img src="http://localhost/app/MyKosan/assets/images/kosan/' + data[i].foto + '" alt="" class="img-thumbnail"></div>';
					}
					$('.modal-title').html(nama);
					$('.lihat-gambar').html(html);
				}
			})
		}
	})

   let gradientChartOptionsConfigurationWithNumbersAndGrid = {
      maintainAspectRatio: true,
      legend: {
         display: false
      },
      tooltips: {
         bodySpacing: 4,
         mode: "nearest",
         intersect: 0,
         position: "nearest",
         xPadding: 0,
         yPadding: 0,
         caretPadding: 0
      },
      responsive: true,
      scales: {
         yAxes: [{
         gridLines: 0,
         gridLines: {
            zeroLineColor: "transparent",
            drawBorder: false
         }
      }],
      xAxes: [{
         display: 0,
         gridLines: 0,
         ticks: {
            display: false
         },
         gridLines: {
            zeroLineColor: "transparent",
            drawTicks: false,
            display: false,
            drawBorder: false
         }
      }]
      },
      layout: {
      padding: {
         left: 0,
         right: 0,
         top: 25,
         bottom: 25
      }
      }
   };

   let ctx = document.getElementById('myChart').getContext('2d');
   let data_jumlah = [];
   $.post(`aktifitasChart` , function(data){
      let obj = JSON.parse(data);
      $.each(obj, function(test, item){
         data_jumlah.push(item[0].jumlah);
      });
      
	let myChart = new Chart(ctx, {
		type: 'line',
		data: {	
			labels: ['JAN','FEB','MARET','APRIL','MEI','JUNI','JULI','AGT','SEP','OKT','NOV','DES'],
			datasets: [{
				label: 'Aktifitas',
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
            text: 'Aktifitas Aplikasi MyKosan',
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
   });
});



   let cts = document.getElementById('pemilik').getContext("2d");
   let data_pemilik = [];

   gradientFill = cts.createLinearGradient(40, 170, 0, 50);
   gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
   gradientFill.addColorStop(1, hexToRGB('#18ce0f', 0.4));
   $.post('chartPemilik' , function(data){
      let obj = JSON.parse(data);
      $.each(obj , function(test,item){   
         data_pemilik.push(parseInt(item[0].jumlah));
      })
   })
   let pemilik = new Chart(cts, {
   type: 'line',
      responsive: true,
      data: {
		labels: ['JAN','FEB','MARET','APRIL','MEI','JUNI','JULI','AGT','SEP','OKT','NOV','DES'],
      datasets: [{
         borderColor: "#18ce0f",
         pointBorderColor: "#FFF",
         pointBackgroundColor: "#18ce0f",
         pointBorderWidth: 2,
         pointHoverRadius: 4,
         pointHoverBorderWidth: 1,
         pointRadius: 4,
         fill: true,
         backgroundColor: gradientFill,
         borderWidth: 2,
         data: data_pemilik
         }]
      },
      options: gradientChartOptionsConfigurationWithNumbersAndGrid
   });
   let usr = document.getElementById('user').getContext("2d");
   let data_user = [];

   gradientFill = usr.createLinearGradient(0, 170, 0, 50);
   gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
   gradientFill.addColorStop(1, hexToRGB('#18ce0f', 0.4));
   $.post('chartUser' , function(data){
      let obj = JSON.parse(data);
      $.each(obj , function(test,item){
         
         data_user.push(parseInt(item[0].jumlah));
      })
   })
   let user = new Chart(usr, {
   type: 'line',
      responsive: true,
      data: {
		labels: ['JAN','FEB','MARET','APRIL','MEI','JUNI','JULI','AGT','SEP','OKT','NOV','DES'],
      datasets: [{
         borderColor: "#18ce0f",
         pointBorderColor: "#FFF",
         pointBackgroundColor: "#18ce0f",
         pointBorderWidth: 2,
         pointHoverRadius: 4,
         pointHoverBorderWidth: 1,
         pointRadius: 4,
         fill: true,
         backgroundColor: gradientFill,
         borderWidth: 2,
         data: data_user
         }]
      },
      options: gradientChartOptionsConfigurationWithNumbersAndGrid
});
   let ksn = document.getElementById('kosan').getContext("2d");
   let data_kosan = [];

   gradientFill = ksn.createLinearGradient(0, 170, 0, 50);
   gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
   gradientFill.addColorStop(1, hexToRGB('#18ce0f', 0.4));
   $.post('chartKosan' , function(data){
      let obj = JSON.parse(data);
      $.each(obj , function(test,item){
         data_kosan.push(parseInt(item[0].jumlah));
      })
   })
   let kosan = new Chart(ksn, {
   type: 'line',
      responsive: true,
      data: {
		labels: ['JAN','FEB','MARET','APRIL','MEI','JUNI','JULI','AGT','SEP','OKT','NOV','DES'],
      datasets: [{
         borderColor: "#18ce0f",
         pointBorderColor: "#FFF",
         pointBackgroundColor: "#18ce0f",
         pointBorderWidth: 2,
         pointHoverRadius: 4,
         pointHoverBorderWidth: 1,
         pointRadius: 4,
         fill: true,
         backgroundColor: gradientFill,
         borderWidth: 2,
         data: data_kosan
         }]
      },
      options: gradientChartOptionsConfigurationWithNumbersAndGrid
});

});

