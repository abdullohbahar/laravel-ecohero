<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'desc')->get();

        $data = [
            'active' => 'data-pelanggan',
            'customers' => $customers
        ];

        return view('admin.customer.index', $data);
    }

    public function create()
    {
        $data = [
            'active' => 'data-pelanggan'
        ];

        return view('admin.customer.create', $data);
    }


     public function detail()
                {
                    $totalCustomers = Customer::count(); // Menghitung jumlah total pelanggan
                    return view('admin.customer.detail', compact('totalCustomers'));
                     $customers = Customer::all(); // Mendapatkan semua data pelanggan
                    return view('customer.detail', compact('customers'));
                }
    

   



    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'email' => 'required|unique:customers,email',
            'phone_number' => 'required|unique:customers,phone_number',
            'country' => 'required',
            'street_address' => 'required',
            'town' => 'required',
            'province' => 'required',
            'post_code' => 'required',
        ], [
            'first_name.required' => 'Nama Awal Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'phone_number.required' => 'Nomor HP Harus Diisi',
            'email.unique' => 'Email Sudah Digunakan',
            'phone_number.unique' => 'Nomor HP Sudah Digunakan',
            'country.required' => 'Negara Harus Diisi',
            'street_address.required' => 'Jalan Harus Diisi',
            'town.required' => 'Kota Harus Diisi',
            'province.required' => 'Provinsi Harus Diisi',
            'post_code.required' => 'Kode Pos Harus Diisi',
        ]);

        Customer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'country' => $request->country,
            'street_address' => $request->street_address,
            'town' => $request->town,
            'province' => $request->province,
            'post_code' => $request->post_code,
        ]);

        return to_route('admin.customer')->with('success', 'Berhasil menambah pelanggan');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        $data = [
            'customer' => $customer,
            'active' => 'data-customer'
        ];

        return view('admin.customer.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'first_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'country' => 'required',
            'street_address' => 'required',
            'town' => 'required',
            'province' => 'required',
            'post_code' => 'required',
        ], [
            'first_name.required' => 'Nama Awal Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'phone_number.required' => 'Nomor HP Harus Diisi',
            'country.required' => 'Negara Harus Diisi',
            'street_address.required' => 'Jalan Harus Diisi',
            'town.required' => 'Kota Harus Diisi',
            'province.required' => 'Provinsi Harus Diisi',
            'post_code.required' => 'Kode Pos Harus Diisi',
        ]);

        if ($request->email != $customer->email) {
            $request->validate([
                'email' => 'unique:customers,email',
                'phone_number' => 'unique:customers,phone_number'
            ], [
                'email.unique' => 'Email Sudah Digunakan',
                'phone_number.unique' => 'Nomor HP Sudah Digunakan',
            ]);
        }

        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone_number = $request->phone_number;
        $customer->country = $request->country;
        $customer->street_address = $request->street_address;
        $customer->town = $request->town;
        $customer->province = $request->province;
        $customer->post_code = $request->post_code;
        $customer->save();

        return to_route('admin.customer')->with('success', 'Berhasil mengubah data pelanggan');
    }

    public function destroy($id)
    {
        try {
            $customer = Customer::findOrFail($id); // Temukan customer yang akan dihapus

            // Hapus customer dari tabel customer
            $customer->delete();

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
