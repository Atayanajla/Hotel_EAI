## Hotel ##

|NAMA                   | NIM       |
|:---:|:---:|
|ATAYA NAJLA            | 1202200158|
|KEYSIA ALODIA B        | 1202204053|
|NABIL EGAN VALENTINO   | 1202204302|
|RIDA NAPISA            | 1202200037|
|ORVALAMARVA            | 1202204249|

### Get list hotel ###

```
GET /show/hotel
```
    
#### Response ####
```
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
```

### Get Hotel By Id ###
```
GET /show/hotel/detail/{id}
```
 
|Parameter    | Type    | Description
|:---:|:---:|:---:|
|Id           | Integer  | Id digunakan untuk mencari spesifik hotel

 
#### Response ####
```
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
```
### Get Hotel By location ###
```
GET /show/lokasi/hotel
```

|Parameter    | Type    | Description
|:---:|:---:|
|search          | String  | Search digunakan untuk mencari berdasarkan lokasi hotel

#### Response ####
```
{
    "success": true,
    "message": "Detail Hotel!",
    "data": [
        {
            "id": 1,
            "nama_hotel": "Aston Hotel",
            "title": "Aston Jakarta",
            "rating": 4,
            "fasilitas": "Swimming Pool",
            "daerah": "Jakarta",
            "created_at": "2023-06-04T18:07:35.000000Z",
            "updated_at": "2023-06-04T18:07:35.000000Z",
            "harga": 650
        }
    ]
}
```
