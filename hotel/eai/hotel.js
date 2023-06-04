const settings = {
    async: true,
    crossDomain: true,
    url: 'https://hotels4.p.rapidapi.com/locations/v3/search?',
    method: 'GET',
    headers: {
      'X-RapidAPI-Key': 'ee03e10663mshc3e1be7ed9e041ap1c586ejsnea9caf64c1a3',
      'X-RapidAPI-Host': 'hotels4.p.rapidapi.com'
    }
  };
  
  $('#search-input').on('input', function () {
    const search = $(this).val();
    const q = `q=${search}&locale=en_US&langid=1033&siteid=300000001`;
    $.ajax({ ...settings, url: `${settings.url}${q}` }).done(function (response) {
      $('#hasil-pencarian').html("");
      console.log(response)
      console.log(response.sr[0]['regionNames']['fullName'])
      if (response.rc === 'OK') {
        response.sr.forEach(element => {
          $('#hasil-pencarian').append(`
            <div class="col-md-4 mb-4">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">${element.q}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">${element.regionNames.fullName}</h6>
                </div>
              </div>
            </div>
          `)
        });
      }
    });
  });
  