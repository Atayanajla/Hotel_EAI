<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    public function showHotel(Request $request)
    {
        $hotel = Hotel::latest()->get();
        return response()->json([
            'success' => true,
            'message' => 'List Semua hotel',
            'data' => $hotel
        ], 200);
    }

    public function showById( $id )
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

    public function tambah_hotel( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'nama_hotel' => 'required',
            'harga' => 'required',
        ],
            [
                'nama_hotel.required' => 'Masukkan Nama Hotel !',
                'harga.required' => 'Harga harus diisi!',
            ]
        );
        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $hotel = Hotel::create([
                'nama_hotel' => $request->input('nama_hotel'),
                'title' => $request->input('title'),
                'rating' => $request->input('rating'),
                'fasilitas' => $request->input('fasilitas'),
                'daerah' => $request->input('daerah'),
                'harga' => $request->input('harga'),
            ]);

            if ($hotel) {
                return response()->json([
                    'success' => true,
                    'message' => 'hotel Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'hotel Gagal Disimpan!',
                ], 401);
            }
        }
    }

    public function hapus_hotel($id)
    {
        $getHotel_id = Hotel::find($id);
        $getHotel_id->delete();
        if ($getHotel_id) {
            return response()->json([
                'success' => true,
                'message' => 'Hotel telah dihapus',
                'data' => 'data ditemukan',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Hotel gagal dihapus',
                'data' => 'Data tidak ditemukan'
            ], 401);
        }

    }
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

    public function edit_hotel( Request $request, $id )
    {
        $edit_hotel = Hotel::find($id);
        $edit_hotel->nama_hotel = $request->input('nama_hotel');
        $edit_hotel->title = $request->input('title');
        $edit_hotel->rating = $request->input('rating');
        $edit_hotel->fasilitas = $request->input('fasilitas');
        $edit_hotel->daerah = $request->input('daerah');
        $edit_hotel->harga = $request->input('harga');
        $edit_hotel->save();
        if ($edit_hotel) {
            return response()->json([
                'success' => true,
                'message' => 'Edit Hotel Berhasil!',
                'data' => 'Data hotel berhasil diedit',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Edit Hotel Gagal!',
                'data' => 'Data hotel gagal diedit'
            ], 401);
        }


    }
}

