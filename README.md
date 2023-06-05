## Hotel ##

|NAMA                   | NIM       |
|:---:|:---:|
|ATAYA NAJLA            | 1202200158|
|KEYSIA ALODIA B        | 1202204053|
|NABIL EGAN VALENTINO   | 1202204302|
|RIDA NAPISA            | 1202200037|
|ORVALAMARVA            | 1202204249|

## Get list hotel ##
#Example Request

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

