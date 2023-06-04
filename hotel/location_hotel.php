<?php
if (isset($_GET['city'])) {
    $city = urlencode($_GET['city']);

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://hotels-com-free.p.rapidapi.com/srle/listing/v1/brands/hotels.com?locale=id_ID&currency=IDR&sortOrder=PRICE&destinationId=$city&pageNumber=1&pageSize=25&adults1=1&checkIn=2023-05-10&checkOut=2023-05-13",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: hotels-com-free.p.rapidapi.com",
            "X-RapidAPI-Key: 44ec9328d1msh2b47bdcb419296ep137492jsn2c7101b3d8d1"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $hotels = json_decode($response, true)['data']['body']['searchResults']['results'];

        foreach ($hotels as $hotel) {
            echo "<div class='card my-3'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $hotel['name'] . "</h5>";
            echo "<p class='card-text'>" . $hotel['starRatingLabel'] . "</p>";
            echo "<p class='card-text'>Mulai dari " . $hotel['ratePlan']['price']['current'] . " " . $hotel['ratePlan']['price']['info']['currency'] . "/malam</p>";
            echo "<a href='" . $hotel['urls']['details'] . "' class='btn btn-primary'>Lihat Detail</a>";
            echo "</div>";
            echo "</div>";
        }
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <form action="" class="col-sm-6 offset-sm-3 mt-5">
        <div class="input-group">
            <input type="text" id="search_location" class="form-control" placeholder="Cari hotel">
            <span class="input-group-text"><button class="btn btn-dark" id="search_button">Cari</button></span>
        </div>
    </form>

    <div id="isi_pencarian">
        
    </div>


    <!-- <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>