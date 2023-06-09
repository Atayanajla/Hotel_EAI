## Hotel ##

|NAMA                   | NIM       |
|:---:|:---:|
|ATAYA NAJLA            | 1202200158|
|KEYSIA ALODIA B        | 1202204053|
|NABIL EGAN VALENTINO   | 1202204302|
|RIDA NAPISA            | 1202200037|
|ORVALAMARVA            | 1202204249|

### Get list hotel ###

#Example Request

Route::get('/show/hotel', [HotelController::class, "showHotel"]);

public function showHotel()
    {
        $hotel = Hotel::latest()->get();
        return response()->json([
            'success' => true,
            'message' => 'List Semua hotel',
            'data' => $hotel
        ], 200);
    }
    
#Response

{
    "success": true,
    "message": "List Semua hotel",
    "data": [
        {
            "id": 4,
            "nama_hotel": "swis",
            "title": "swis hotel",
            "rating": 3,
            "fasilitas": "Tempat karoke",
            "daerah": "Bandung",
            "created_at": "2023-06-04T15:15:26.000000Z",
            "updated_at": "2023-06-04T23:50:35.000000Z",
            "harga": 200
        }
}

## Get Hotel By Id ##
#Example Request

Route::get('/show/hotel/detail/{id}', [HotelController::class, "showById"]);

{
        $getHotel_id = Hotel::find($id);
        if ($getHotel_id) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Hotel!',
                'data' => $getHotel_id,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Hotel tidak ditemukan',
                'data' => 'Data kosong'
            ], 401);
        }
    }
 
#Response

{
    "success": true,
    "message": "Detail Hotel!",
    "data": {
        "id": 5,
        "nama_hotel": "Ibis",
        "title": "Ibis Trans studio bandung",
        "rating": 5,
        "fasilitas": "Kolam berenang",
        "daerah": "Bandung",
        "created_at": null,
        "updated_at": null,
        "harga": 500
    }
}

## Get Hotel By location ##
#Example Request

Route::get('/show/lokasi/hotel', [HotelController::class, "cari_lokasi"]);

public function cari_lokasi( Request $request )
    {
        $searchValue = $request->input('search');
        $cari_lokasi_hotel = Hotel::where('daerah', 'like', '%' . $searchValue . '%')
        ->latest()->get();
        if ($cari_lokasi_hotel) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Hotel!',
                'data' => $cari_lokasi_hotel,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Hotel tidak ditemukan',
                'data' => 'Data kosong'
            ], 401);
        }
    }
    
#Response

{
    "success": true,
    "message": "Detail Hotel!",
    "data": []
}
