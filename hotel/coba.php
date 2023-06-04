<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Search Hotels</title>
</head>

<body>
    <form method="GET">
        <input type="text" name="location" placeholder="Enter a location" />
        <button type="submit">Search</button>
    </form>
    <div id="results"></div>

    <?php
    if (isset($_GET['location'])) {
        $location = $_GET['location'];
        $url = "https://hotels4.p.rapidapi.com/locations/v1/search?q=" . urlencode($location);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: hotels4.p.rapidapi.com",
                "x-rapidapi-key: 44ec9328d1msh2b47bdcb419296ep137492jsn2c7101b3d8d1"
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "Error: " . $err;
        } else {
            $data = json_decode($response, true);
            if (isset($data['suggestions'])) {
                $sr = $data['suggestions'][0]['entities'];

                if (count($sr) == 0) {
                    echo "No results found for {$location}";
                } else {
                    foreach ($sr as $s) {
                        if ($s['type'] == 'CITY' || $s['type'] == 'NEIGHBORHOOD') {
                            echo "<h2>{$s['name']}, {$s['countryName']}</h2>";
                        }
                        if ($s['type'] == 'AIRPORT' || $s['type'] == 'LANDMARK') {
                            echo "<h3>{$s['name']}, {$s['countryName']}</h3>";
                        }
                        if ($s['type'] == 'HOTEL') {
                            echo "<h4>{$s['name']}, an {$s['hotelPricingInfo']['priceLabel']} {$s['hotelPricingInfo']['recommendedPrice']['formatted']} {$s['hotelPricingInfo']['currencyCode']} Hotel</h4>";
                        }
                    }
                }
            } else {
                echo "No results found for {$location}";
            }
        }
    }
    ?>

</body>

</html>
