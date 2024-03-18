<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Timeline;
use App\Models\TrackingData;
use Illuminate\Http\Request;

class TrackingDataController extends Controller
{
    public function index()
    {
        $trackingDatas = TrackingData::with('customer')->orderBy('created_at', 'desc')->get();

        $data = [
            'active' => 'tracking-data',
            'trackingDatas' => $trackingDatas
        ];

        return view('admin.tracking-data.index', $data);
    }

    public function create()
    {
        $customers = Customer::orderBy('first_name', 'asc')->get();

        $data = [
            'active' => 'tracking-data',
            'customers' => $customers
        ];

        return view('admin.tracking-data.create', $data);
    }

    public function getCustomer($id)
    {
        $customer = Customer::where('id', $id)->first();

        if ($customer) {
            $data = [
                'customer' => $customer
            ];

            return response()->json([
                'message' => 'success',
                'status' => 200,
                'data' => $data
            ]);
        } else {
            return response()->json([
                'message' => 'not found',
                'status' => 404,
                'data' => ''
            ]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'resi_number' => 'required',
            'courier' => 'required',
            'delivery_date' => 'required',
            'origin' => 'required',
            'destination' => 'required'
        ], [
            'customer_id.required' => 'Pengirim harus diisi',
            'resi_number.required' => 'Nomor Resi harus diisi',
            'courier.required' => 'Kurir harus diisi',
            'delivery_date.required' => 'Tanggal Pengiriman harus diisi',
            'origin.required' => 'Asal harus diisi',
            'destination.required' => 'Tujuan harus diisi',
        ]);

        $lastTrackingData = TrackingData::orderBy('created_at', 'desc')->first();

        // Mengecek apakah sudah ada data dalam tabel
        $newId = $lastTrackingData ? (intval(substr($lastTrackingData->tracking_id, 3)) + 1) : 1;

        // Format ID sesuai kebutuhan
        $formattedId = 'eco' . str_pad($newId, 5, '0', STR_PAD_LEFT);

        TrackingData::create([
            'customer_id' => $request->customer_id,
            'resi_number' => $request->resi_number,
            'courier' => $request->courier,
            'delivery_date' => $request->delivery_date,
            'origin' => $request->origin,
            'destination' => $request->destination,
            'tracking_id' => $formattedId,
        ]);

        return to_route('admin.tracking.data')->with('success', 'Berhasil');
    }

    public function edit($id)
    {
        $trackingData = TrackingData::findorfail($id);
        $customers = Customer::orderBy('first_name', 'asc')->get();

        $data = [
            'active' => 'tracking-data',
            'trackingData' => $trackingData,
            'customers' => $customers
        ];

        return view('admin.tracking-data.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required',
            'resi_number' => 'required',
            'courier' => 'required',
            'delivery_date' => 'required',
            'origin' => 'required',
            'destination' => 'required'
        ], [
            'customer_id.required' => 'Pengirim harus diisi',
            'resi_number.required' => 'Nomor Resi harus diisi',
            'courier.required' => 'Kurir harus diisi',
            'delivery_date.required' => 'Tanggal Pengiriman harus diisi',
            'origin.required' => 'Asal harus diisi',
            'destination.required' => 'Tujuan harus diisi',
        ]);

        TrackingData::where('id', $id)->update([
            'customer_id' => $request->customer_id,
            'resi_number' => $request->resi_number,
            'courier' => $request->courier,
            'delivery_date' => $request->delivery_date,
            'origin' => $request->origin,
            'destination' => $request->destination,
        ]);

        return to_route('admin.tracking.data')->with('success', 'Berhasil Mengubah Data Tracking');
    }

    public function timeline($id)
    {
        $trackingData = TrackingData::with([
            'timelines' => function ($query) {
                $query->orderBy('tanggal', 'desc');
            }
        ])->findorfail($id);

        $data = [
            'active' => 'tracking-data',
            'trackingData' => $trackingData
        ];

        return view('admin.tracking-data.timeline', $data);
    }

    public function storeTimeline(Request $request, $trackingID)
    {
        $request->validate([
            'tanggal' => 'required',
            'jam' => 'required',
            'status' => 'required',
            'asal' => 'required',
            'tujuan' => 'required',
        ], [
            'tanggal.required' => 'Tanggal harus diisi',
            'jam.required' => 'Jam harus diisi',
            'status.required' => 'Status harus diisi',
            'asal.required' => 'Asal harus diisi',
            'tujuan.required' => 'Tujuan harus diisi'
        ]);

        Timeline::create([
            'tracking_data_id' => $trackingID,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'status' => $request->status,
            'asal' => $request->asal,
            'tujuan' => $request->tujuan,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambah timeline');
    }

    public function updateTimeline(Request $request)
    {
        $request->validate([
            'editTanggal' => 'required',
            'editJam' => 'required',
            'editStatus' => 'required',
            'editAsal' => 'required',
            'editTujuan' => 'required',
        ], [
            'editTanggal.required' => 'Tanggal harus diisi',
            'editJam.required' => 'Jam harus diisi',
            'editStatus.required' => 'Status harus diisi',
            'editAsal.required' => 'Asal harus diisi',
            'editTujuan.required' => 'Tujuan harus diisi'
        ]);

        Timeline::where('id', $request->timelineID)->update([
            'tanggal' => $request->editTanggal,
            'jam' => $request->editJam,
            'status' => $request->editStatus,
            'asal' => $request->editAsal,
            'tujuan' => $request->editTujuan,
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah timeline');
    }

    public function destroyTimeline($id)
    {
        try {
            $timeline = Timeline::findOrFail($id); // Temukan timeline yang akan dihapus

            // Hapus timeline dari tabel timeline
            $timeline->delete();

            // Mengembalikan respons JSON sukses dengan status 200
            return response()->json([
                'message' => 'Berhasil Menghapus Data',
                'code' => 200,
                'error' => false
            ]);
        } catch (\Exception $e) {
            // Menangkap exception jika terjadi kesalahan
            return response()->json([
                'message' => 'Gagal Menghapus Data',
                'code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}
