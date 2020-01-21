const title = $('title').html();
$('.nav-item').on('click', function(e){

    if(title == "MyKosan - Home Page"){
        
    let tujuan = $(this).attr('href');
    let elemen = $(tujuan);

    $('html, body').animate({
        scrollTop: elemen.offset().top
    });
    
    e.preventDefault();
    }
    

});

$('.btn-pesan').on('click', function(){
    const jumlahKamar = $(this).data('kamar');
    const r = $('#jumlah_kamar_tersedia').html();
    
    var html = '';
	var i;
	for (i = 1; i <= jumlahKamar; i++) {
		html += `<option value="${i}">${i}</option>`;
	}
	$('#jumlah_kamar_tersedia').html(html)

})

$('.btn-pesan-kamar').on('click', function(e){
    let tujuan = $(this).attr('href');
    let elemen = $(tujuan);

    $('html, body').animate({
        scrollTop: elemen.offset().top
    });
    
    e.preventDefault();
})



