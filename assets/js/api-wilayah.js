$(document).ready(function () {

	$('#kota').attr('disabled', 'disabled')
	$('#kecamatan').attr('disabled', 'disabled')

	$('#provinsi').change(function () {
		var split = $(this).val();
		var res = split.split("|");
		const id = res[0];
		$('#kota').removeAttr('disabled');
		$.ajax({
			url: 'http://localhost/app/MyKosan/home/getKota/' + id,
			data: {
				id: id
			},
			method: 'POST',
			dataType: 'json',
			success: function (data) {
				console.log(data);
				var html = '';
				var i;
				for (i = 0; i < data.length; i++) {
					html += `<option value="${data[i].id}|${data[i].name}">${data[i].name}</option>`;
				}
				$('.kota').html(html);
			}
		});
	});

	$('#kota').change(function () {
		var split = $(this).val();
		var res = split.split("|");
		const id = res[0];
		$('#kecamatan').removeAttr('disabled');

		$.ajax({
			url: 'http://localhost/app/MyKosan/home/getKecamatan/' + id,
			data: {
				id: id
			},
			method: 'POST',
			dataType: 'json',
			success: function (data) {
				var html = '';
				var i;
				for (i = 0; i < data.length; i++) {
					html += '<option>' + data[i].name + '</option>';
				}
				$('.kecamatan').html(html);
			}
		})
	})


	$('.btn-pesan').on('click', function () {
		const id = $(this).data('id');
		$('#id_tipe').val(id);
	})
})
