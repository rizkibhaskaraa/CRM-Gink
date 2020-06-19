console.log('ok');
//ambil elemen
var button = document.getElementById('detail-popup');
var konten = document.getElementById("main-container");
var alamat = document.getElementById('linkdetail');

button.addEventListener('click', function(){
    //buat objeck
    window.alert(alamat.value);
	var ajaxdetail = new XMLHttpRequest();

	ajaxdetail.onreadystatechange = function(){
		if(ajaxdetail.readyState == 4 && ajaxdetail.status == 200){
			konten.innerHTML = ajaxdetail.responseText;
		}
	}
	ajaxdetail.open('GET', alamat.value , true);
	ajaxdetail.send();

});
