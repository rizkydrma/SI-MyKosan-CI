$(document).ready(function () {

	$('#kosan-table').DataTable({
		scrollY: "300px",
		scrollX: "90vw",
		scrollCollapse: true,
		paging: true,
		fixedColumns: {
			heightMatch: 'none'
		}
	});
	
	// MENAMPILKAN TOMBOL SUBMIT
	$('.modal-footer button[type=button]').on('click', function () {
		$('.modal-footer button[type=submit]').show();
	})

	$('#kota').attr('readonly');
	$('#kecamatan').attr('readonly');
	unread();

	// USER
	$('.simpan-perubahan').hide();
	$('.custom-file').hide();
	$('.custom-file-input').on('change', function () {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	})


	// GET DATA API WILAYAH
	$('#provinsi').change(function () {
		var split = $(this).val();
		var res = split.split("|");
		const id = res[0];
		$('#kota').removeAttr('readonly');
		$.ajax({
			url: 'http://localhost/app/MyKosan/kosan/getKota/' + id,
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
		$('#kecamatan').removeAttr('readonly');

		$.ajax({
			url: 'http://localhost/app/MyKosan/kosan/getKecamatan/' + id,
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


	// AJAX MODAL KOSAN
	$('.popupModal').on('click', function () {
		const id = $(this).data('id');
		const nama = $(this).data('nama');
		const modal = $(this).data('modal');
		
		if (modal == "lihat_kosan") {
			$('.modal-footer button[type=submit]').hide();

			$.ajax({
				url: 'http://localhost/app/MyKosan/kosan/lihat_gambar/' + id,
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
						html += '<div class="col"><img src="http://localhost/app/MyKosan/assets/images/kosan/' + data[i].foto + '" alt="" class="img-thumbnail"></div>';
					}
					$('.modal-title').html(nama);
					$('.lihat-gambar').html(html);
				}
			})
		} else if (modal == "lihat_tipe") {
			$('.modal-footer button[type=submit]').hide();

			$.ajax({
				url: 'http://localhost/app/MyKosan/kamar/lihat_gambar/' + id,
				data: {
					id: id
				},
				method: 'POST',
				dataType: 'json',
				success: function (data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<div class="col"><img src="http://localhost/app/MyKosan/assets/images/tipe_kamar/' + data[i].foto + '" alt="" class="img-thumbnail"></div>';
					}
					$('.modal-title').html(nama);
					$('.lihat-gambar').html(html);
				}
			})
		}

	})


	// DETAIL KOSAN
	$('.btn-modal').on('click', function () {
		const modal = $(this).data('modal');

		if (modal == "tambah") {
			unread();
			$('.modal-title').html('Tambah Data Kosan')
			$('button[type=submit]').html('Tambah Data');
			$('#nama_kosan').val('')
			$('#provinsi').val('')
			$('#kota').val('')
			$('#kecamatan').val('')
			$('#alamat').val('')
		} else if (modal == "ubah") {
			unread();
			$('.modal-title').html('Ubah Data Kosan');
			$('button[type=submit]').html('Ubah Data');
			$('.modal-body form').attr('action', 'http://localhost/app/MyKosan/kosan/ubahData');

			const id = $(this).data('id');
			$.ajax({
				url: 'http://localhost/app/MyKosan/kosan/detail/' + id,
				data: {
					id: id
				},
				method: 'POST',
				dataType: 'json',
				success: function (data) {
					data = data.kosan[0];
					$('#nama_kosan').val(data.nama_kosan)
					$('#provinsi').prepend(`
					<option value='${data.provinsi}' selected>${data.provinsi}</option>
					`)
					$('#kota').prepend(`
					<option value='${data.kota}' selected>${data.kota}</option>
					`)
					$('#kecamatan ').prepend(`
					<option value='${data.kecamatan}' selected>${data.kecamatan}</option>
					`)
					$('#alamat').val(data.alamat)
					$('#deskripsi').val(data.deskripsi)
					$('#id_kosan').val(data.id_kosan)
					$('#id_pemilik').val(data.id_pemilik)
				}
			})
		} else if (modal == "lihat") {
			$('.modal-footer button[type=submit]').hide();
		} else if (modal == "detail") {
			$('.modal-footer button[type=submit]').hide();
			$('.modal-title').html('Detail Info Kosan');
			read();
			const id = $(this).data('id');
			$.ajax({
				url: 'http://localhost/app/MyKosan/kosan/detail/' + id,
				data: {
					id: id
				},
				method: 'POST',
				dataType: 'json',
				success: function (data) {
					data = data.kosan[0];
					$('#nama_kosan').val(data.nama_kosan)
					$('#provinsi').prepend(`
						<option value=${data.provinsi} selected>${data.provinsi}</option>
						`)
					$('#kota').prepend(`
						<option value=${data.kota} selected>${data.kota}</option>
						`)
					$('#kecamatan ').prepend(`
						<option value=${data.kecamatan} selected>${data.kecamatan}</option>
						`)
					$('#alamat').val(data.alamat)
					$('#deskripsi').val(data.deskripsi)
				}
			})
		} else if (modal == "kamarTambah") {
			unread();
			$('.modal-title').html('Tambah Data Kamar')
			$('button[type=submit]').html('Tambah Data')
			$('#nama_tipe').val('')
			$('#tipe_kamar').val('')
			$('#jumlah_kamar').val('')
			$('#kamar_tersedia').val('')
			$('#fasilitas').val('')
			$('#harga').val('')
			$('#fasilitas').tagsInput({
					width: 'auto',
					onChange: function (elem, elem_tags) {
						var languages = ['wifi', 'parkir', 'dapur'];
						$('.tag', elem_tags).each(function () {
							if ($(this).text().search(new RegExp('\\b(' + languages.join('|') + ')\\b')) >= 0)
								$(this).css('background-color', 'yellow');
						});
					}
			});
			
			

			$.ajax({
				url: 'http://localhost/app/MyKosan/kamar/getKosan',
				method: 'POST',
				dataType: 'json',
				success: function (data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += `<option value="${data[i].id_kosan}">${data[i].nama_kosan}</option>`;
					}
					$('#id_kosan').html(html);
					$('#id_kosan').prepend(`<option selected> Pilih Kosan </option>`)
				}
			})
		} else if (modal == "ubahKamar") {
			unread();
			$('.modal-title').html('Ubah Data Kamar')
			$('button[type=submit]').html('Ubah Data')
			$('.modal-body form').attr('action', 'http://localhost/app/MyKosan/kamar/ubahData')
			const id = $(this).data('id')

			$.ajax({
				url: 'http://localhost/app/MyKosan/kamar/detail',
				data: {
					id: id
				},
				method: 'POST',
				dataType: 'JSON',
				success: function (data) {
					kosan = data.kosan;
					kamar = data.kamar;
					console.log(kamar);
					$('#id_kosan').prepend(`<option value='${kamar.id_kosan}' selected>${kosan.nama_kosan}</option>`)
					$('#nama_tipe').val(kamar.nama_tipe)
					$('#tipe_kamar').val(kamar.tipe_kamar)
					$('#jumlah_kamar').val(kamar.jumlah_kamar)
					$('#kamar_tersedia').val(kamar.jumlah_kamar_tersedia)
					$('#fasilitas').val(kamar.fasilitas)
					$('#harga').val(kamar.harga)
					$('#id_tipe').val(kamar.id_tipe)
				}
			})
		} else if (modal == "detailKamar") {
			$('.modal-footer button[type=submit]').hide();
			$('.modal-title').html('Detail Info Tipe Kamar');
			read();
			const id = $(this).data('id');
			$.ajax({
				url: 'http://localhost/app/MyKosan/kamar/detail',
				data: {
					id: id
				},
				method: 'POST',
				dataType: 'JSON',
				success: function (data) {
					kosan = data.kosan;
					kamar = data.kamar;
					console.log(kamar);
					$('#id_kosan').prepend(`<option value='${kamar.id_kosan}' selected>${kosan.nama_kosan}</option>`)
					$('#nama_tipe').val(kamar.nama_tipe)
					$('#tipe_kamar').val(kamar.tipe_kamar)
					$('#jumlah_kamar').val(kamar.jumlah_kamar)
					$('#kamar_tersedia').val(kamar.jumlah_kamar_tersedia)
					$('#fasilitas').val(kamar.fasilitas)
					$('#harga').val(kamar.harga)
					$('#id_tipe').val(kamar.id_tipe)
				}
			})
		} else if (modal == "detailTransaksi") {
			const id = $(this).data('id');
			read();
			$.ajax({
				url: 'http://localhost/app/MyKosan/transaksi/detail',
				data: {
					id: id
				},
				method: 'POST',
				dataType: 'JSON',
				success: function (data) {
					const time = data.tgl_transaksi;
					console.log(time);


let waktu = new Date().toDateString(time);

					$('#no_invoice').html(data.no_invoice)
					$('#nama_user').val(data.nama_user)
					$('#nama_kosan').val(data.nama_kosan)
					$('#nama_tipe').val(data.nama_tipe)
					$('#lama_sewa').val(data.lama_sewa)
					$('#tgl_transaksi').val(waktu)
					$('#tgl_masuk').val(data.tgl_masuk)
					$('#tgl_keluar').val(data.tgl_keluar)
					$('#total_harga').val(data.total_harga)
					$('#status').val(data.status)
				}
			})
		}else if (modal == "detailCustomer") {
			console.log("ok");
			const id = $(this).data('id');
			read();
			$.ajax({
				url: 'http://localhost/app/MyKosan/customer/getDetail',
				data: {
					id: id
				},
				method: 'POST',
				dataType: 'JSON',
				success: function (data) {
					$('#no_invoice').html(data.no_invoice)
					$('#nama_user').val(data.nama_user)
					$('#nama_kosan').val(data.nama_kosan)
					$('#nama_tipe').val(data.nama_tipe)
					$('#tgl_masuk').val(data.tgl_masuk)
					$('#tgl_keluar').val(data.tgl_keluar)
					$('#email').val(data.email)
					$('#no_telp').val(data.no_telp)
				}
			})
		}
	})

	$('.edit-profile').on('click', function () {
		undisabledForm();
		$('.simpan-perubahan').show();
		$('.custom-file').show();
	})

});

function unread() {
	$('#nama_kosan').removeAttr('readonly', 'readonly');
	$('#provinsi').removeAttr('readonly', 'readonly');
	$('#alamat').removeAttr('readonly', 'readonly');
	$('#deskripsi').removeAttr('readonly', 'readonly');

	// TIPE KAMAR
	$('#id_kosan').removeAttr('readonly', 'readonly');
	$('#nama_tipe').removeAttr('readonly', 'readonly');
	$('#tipe_kamar').removeAttr('readonly', 'readonly');
	$('#jumlah_kamar').removeAttr('readonly', 'readonly');
	$('#kamar_tersedia').removeAttr('readonly', 'readonly');
	$('#fasilitas').removeAttr('readonly', 'readonly');
	$('#harga').removeAttr('readonly', 'readonly');


}

function read() {
	$('#nama_kosan').attr('readonly', 'readonly');
	$('#provinsi').attr('readonly', 'readonly');
	$('#kota').attr('readonly', 'readonly');
	$('#kecamatan').attr('readonly', 'readonly');
	$('#alamat').attr('readonly', 'readonly');
	$('#deskripsi').attr('readonly', 'readonly');


	// TIPE KAMAR
	$('#id_kosan').attr('readonly', 'readonly');
	$('#nama_tipe').attr('readonly', 'readonly');
	$('#tipe_kamar').attr('readonly', 'readonly');
	$('#jumlah_kamar').attr('readonly', 'readonly');
	$('#kamar_tersedia').attr('readonly', 'readonly');
	$('#fasilitas').attr('readonly', 'readonly');
	$('#harga').attr('readonly', 'readonly');


}

function disabledForm() {
	// EDIT PROFILE
	$('#nama_pemilik').attr('disabled', 'disabled')
	$('#email').attr('disabled', 'disabled')
	$('#no_telp').attr('disabled', 'disabled')
	$('#tgl_lahir').attr('disabled', 'disabled')
	$('#alamat').attr('disabled', 'disabled')
}

function undisabledForm() {
	// EDIT PROFILE
	$('#nama_pemilik').removeAttr('disabled', 'disabled')
	$('#email').removeAttr('disabled', 'disabled')
	$('#no_telp').removeAttr('disabled', 'disabled')
	$('#tgl_lahir').removeAttr('disabled', 'disabled')
	$('#alamat').removeAttr('disabled', 'disabled')
}

const flashdata = $('.flashdata').data('flashdata');

if (flashdata) {
	if (flashdata.search('Selamat') >= 0 || flashdata.search('Berhasil') >= 0) {
		Swal.fire({
			title: 'Berhasil',
			text: flashdata,
			type: 'success'
		})
	} else {
		Swal.fire({
			title: 'Maaf',
			text: flashdata,
			type: 'error'
		})
	}
}

// tombol Hapus
$('.tombol-hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Hapus Data',
		text: 'Apa kamu yakin ?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Hapus!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
})

$('.tombol-logout').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'LOGOUT',
		text: 'Apa kamu yakin?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Logout!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
})

$(function () {

	$('.not-active').on('click', function () {
		const id = $(this).data('id');
		const user = $(this).data('user');
		const kosan = $(this).data('kosan');
		const tipe = $(this).data('tipe');
		$('.status form').attr('action', `http://localhost/app/MyKosan/dashboard/menunggu/${id}/${user}/${kosan}/${tipe}`)
	})
	$('.active').on('click', function () {
		const id = $(this).data('id');
		const user = $(this).data('user');
		const kosan = $(this).data('kosan');
		const tipe = $(this).data('tipe');
		$('.status form').attr('action', `http://localhost/app/MyKosan/dashboard/dibayar/${id}/${user}/${kosan}/${tipe}`)
	})

})



