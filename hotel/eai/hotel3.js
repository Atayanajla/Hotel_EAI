const settings = {
	async: true,
	crossDomain: true,
	url: 'https://hotels4.p.rapidapi.com/locations/v3/search?',
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': '6838b8071bmsh3b972f00a819b5dp139c41jsn1abdc49d702c',
		'X-RapidAPI-Host': 'hotels4.p.rapidapi.com'
	}
};



$('#search-input').on('input', function() {
    const search = $(this).val();
    const q = `q=${search}&locale=en_US&langid=1033&siteid=300000001`;
    $.ajax({ ...settings, url: `${settings.url}${q}` }).done(function (response) {
      $('#hasil_pencarian').html("");
      response.forEach(result => {
          $('#hasil_pencarian').append(`
            <div class="col-lg-4 intro_col mb-4">
                <div class="intro_item">
                    <div class="intro_item_overlay"></div>
                    <div class="intro_item_background" style="background-image:url(images/galery_4.jpg)"></div>
                    <div class="intro_item_content d-flex flex-column align-items-center justify-content-center">
                        <div class="intro_date">${result.sr.regionNames.fullName}</div>
                        <div class="intro_center text-center">
                        </div>
                    </div>
                </div>
            </div>
          `)
        })
  
      });
  
    });

// $.ajax(settings).done(function (response) {
// 	console.log(response);
// });