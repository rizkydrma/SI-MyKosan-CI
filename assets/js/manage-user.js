$(document).ready(function () {

	$('#table-riwayat').DataTable({
		scrollY: "300px",
		scrollX: true,
		scrollCollapse: true,
		paging: false,
		fixedColumns: {
			heightMatch: 'none'
		}
	});

	// USER
	$('.simpan-perubahan').hide();
	$('.custom-file').hide();
	$('.custom-file-input').on('change', function () {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	})

	$('.edit-profile').on('click', function () {
		undisabledForm();
		$('.simpan-perubahan').show();
		$('.custom-file').show();
	})

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
		$('#nama_user').removeAttr('readonly', 'readonly')
		$('#no_telp').removeAttr('readonly', 'readonly')
		$('#tgl_lahir').removeAttr('readonly', 'readonly')
		$('#alamat').removeAttr('readonly', 'readonly')
	}

})


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
