<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\TrackingData;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $resi = $request->resi;

        if ($resi) {
            $tracking = TrackingData::with(
                [
                    'timelines' => function ($query) {
                        $query->orderBy('tanggal', 'desc');
                    }
                ]
            )->where('resi_number', $resi)->first();
        } else {
            $tracking = [];
        }

        $data = [
            'trackingData' => $tracking,
            'resi' => $resi,
        ];

        return view('landing.index', $data);
    }
}
