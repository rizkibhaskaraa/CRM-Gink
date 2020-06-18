console.log('ok');
//ambil elemen
var cari = document.getElementById('search');
var layanan = document.getElementById("layanan");
var status_pelanggan = document.getElementById("status-pelanggan");
var konten = document.getElementById('tabel-pelanggan');
var alamat = document.getElementById('link');

cari.addEventListener('keyup', function(){
	//buat objeck
	var ajaxCari = new XMLHttpRequest();

	ajaxCari.onreadystatechange = function(){
		if(ajaxCari.readyState == 4 && ajaxCari.status == 200){
			konten.innerHTML = ajaxCari.responseText;
		}
	}
	ajaxCari.open('GET', alamat.value+layanan.value+"/"+status_pelanggan.value+"/"+cari.value , true);
	ajaxCari.send();

});

layanan.addEventListener('change', function(){
	//buat objeck
	var ajaxLayanan = new XMLHttpRequest();

	ajaxLayanan.onreadystatechange = function(){
		if(ajaxLayanan.readyState == 4 && ajaxLayanan.status == 200){
			konten.innerHTML = ajaxLayanan.responseText;
		}
	}
	ajaxLayanan.open('GET', alamat.value+layanan.value+"/"+status_pelanggan.value+"/"+cari.value , true);
	ajaxLayanan.send();

});

status_pelanggan.addEventListener('change', function(){
	//buat objeck
	var ajaxstatus = new XMLHttpRequest();

	ajaxstatus.onreadystatechange = function(){
		if(ajaxstatus.readyState == 4 && ajaxstatus.status == 200){
			konten.innerHTML = ajaxstatus.responseText;
		}
	}
	ajaxstatus.open('GET', alamat.value+layanan.value+"/"+status_pelanggan.value+"/"+cari.value , true);
	ajaxstatus.send();

});