console.log('ok');
//ambil elemen
// var cari = document.getElementById('search');
// var status_pelanggan = document.getElementById("status-pelanggan");
// var konten = document.getElementById('tabel-pelanggan');
// var alamat = document.getElementById('link');
var alamat_report = document.getElementById('alamat-report');
var tgl_start = document.getElementById('tgl-start');
var tgl_end = document.getElementById('tgl-end');
var button = document.getElementById('button-report');
var button_reset = document.getElementById('button-reset');
var kontenreport = document.getElementById('report-table');

// cari.addEventListener('keyup', function(){
// 	//buat objeck
// 	var ajaxCari = new XMLHttpRequest();

// 	ajaxCari.onreadystatechange = function(){
// 		if(ajaxCari.readyState == 4 && ajaxCari.status == 200){
// 			konten.innerHTML = ajaxCari.responseText;
// 		}
// 	}
// 	ajaxCari.open('GET', alamat.value+cari.value , true);//+status_pelanggan.value+"/"
	
// 	ajaxCari.send();

// });

button.addEventListener('click', function(){
	
	if(tgl_start.value==""){
		tgl_start.value = "2000-01-01";
	}
	if(tgl_end.value==""){
		tgl_end.value = "2200-01-01";
	}
	//buat objeck
	var ajaxstart = new XMLHttpRequest();

	// window.alert(tgl_start.value+"===/==="+tgl_end.value);
	ajaxstart.onreadystatechange = function(){
		if(ajaxstart.readyState == 4 && ajaxstart.status == 200){
			kontenreport.innerHTML = ajaxstart.responseText;
		}
	}
	ajaxstart.open('GET', alamat_report.value+tgl_start.value+"/"+tgl_end.value , true);
	ajaxstart.send();
	if(tgl_end.value == "2200-01-01"){
		tgl_end.value = "";
	}
	if(tgl_start.value == "2000-01-01"){
		tgl_start.value = "";
	}

});

button_reset.addEventListener('click', function(){
	tgl_end.value = tgl_start.value = "";
	var ajaxreset = new XMLHttpRequest();

	ajaxreset.onreadystatechange = function(){
		if(ajaxreset.readyState == 4 && ajaxreset.status == 200){
			kontenreport.innerHTML = ajaxreset.responseText;
		}
	}
	ajaxreset.open('GET', alamat_report.value+"2000-01-01/2200-01-01" , true);
	ajaxreset.send();

});

// status_pelanggan.addEventListener('change', function(){
// 	//buat objeck
// 	var ajaxstatus = new XMLHttpRequest();

// 	ajaxstatus.onreadystatechange = function(){
// 		if(ajaxstatus.readyState == 4 && ajaxstatus.status == 200){
// 			konten.innerHTML = ajaxstatus.responseText;
// 		}
// 	}
// 	ajaxstatus.open('GET', alamat.value+status_pelanggan.value+"/"+cari.value , true);
// 	ajaxstatus.send();

// });