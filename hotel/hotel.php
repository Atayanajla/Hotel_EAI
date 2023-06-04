<!DOCTYPE html>
<html>
<head>
	<title>Pencarian Hotel</title>
</head>
<body>
	<h1>Pencarian Hotel</h1>

	<form method="post" action="">
		<label for="location">Lokasi:</label>
		<input type="text" name="location" id="location">
		<button type="submit" name="submit">Cari</button>
	</form>

	<?php
	if (isset($_POST['submit'])) {
		$location = urlencode($_POST['location']);
		$url = "https://hotels4.p.rapidapi.com/locations/v1/search?q=$location&locale=id_ID";

		$curl = curl_init();

		curl_setopt_array($curl, array(
        //   CURLOPT_URL => "https://hotels4.p.rapidapi.com/locations/v1/search?q=semarang&locale=id_ID",
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "x-rapidapi-host: hotels4.p.rapidapi.com",
		    "x-rapidapi-key: 44ec9328d1msh2b47bdcb419296ep137492jsn2c7101b3d8d1"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$data = json_decode($response, true);
			if (isset($data['suggestions'][0]['entities'])) {
				$entities = $data['suggestions'][0]['entities'];
				echo "<ul>";
				foreach ($entities as $entity) {
					echo "<li>" . $entity['sr']['regionNames']['fullName'] . "</li>";
				}
				echo "</ul>";
			} else {
				echo "Tidak ada hasil yang ditemukan untuk lokasi tersebut.";
			}
		}
	}
	?>

</body>
</html>
