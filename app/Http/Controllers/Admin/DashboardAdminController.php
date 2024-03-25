<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\TrackingData;
use Illuminate\Http\Request;



class DashboardAdminController extends Controller
{
    public function index()
    {
        $totalCustomer = Customer::count();
        $amountOfData = TrackingData::count();
        $dataProcessing = TrackingData::where('status',null)->count();

        $data = [
            'active' => 'dashboard',
            'totalCustomer' => $totalCustomer,
            'amountOfData' => $amountOfData,
            'dataProcessing' => $dataProcessing
        ];
        

        return view('admin.dashboard.index', $data);
    }

    


}




