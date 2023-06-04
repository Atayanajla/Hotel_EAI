// // menambahkan event listener pada tombol "Cari"
// document.getElementById("search_button").addEventListener("click", function() {
// 	// memanggil fungsi pencarian dengan input dari pengguna
// 	searchHotels(document.getElementById("search_location").value);
//   });
  
//   function searchHotels(location) {
// 	// membuat objek settings untuk request ke API
// 	const settings = {
// 	  async: true,
// 	  crossDomain: true,
// 	  url: `https://hotels4.p.rapidapi.com/locations/v3/search?q=${location}&locale=en_US&langid=1033&siteid=300000001`,
// 	  method: "GET",
// 	  headers: {
// 		"X-RapidAPI-Key": "44ec9328d1msh2b47bdcb419296ep137492jsn2c7101b3d8d1",
// 		"X-RapidAPI-Host": "hotels4.p.rapidapi.com"
// 	  }
// 	};
  
// 	// melakukan request ke API
// 	$.ajax(settings).done(function(response) {
// 	  // membersihkan div isi_pencarian sebelum menampilkan hasil baru
// 	  $(".isi_pencarian").html('');
	  
// 	  // menampilkan hasil pencarian
// 	  response.suggestions.forEach(function(suggestion) {
// 		$(".isi_pencarian").append(`<p>${suggestion.group}</p>`);
// 		suggestion.entities.forEach(function(entity) {
// 		  $(".isi_pencarian").append(`<p>${entity.caption}</p>`);
// 		});
// 	  });
// 	});
//   }
  