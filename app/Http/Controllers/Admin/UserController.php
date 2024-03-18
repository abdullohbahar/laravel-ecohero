<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'asc')->get();
        $data = [
            'active' => 'data-user',
            'users' => $users
        ];

        return view('admin.user.index', $data);
    }

    public function create()
    {
        $data = [
            'active' => 'data-user',
        ];

        return view('admin.user.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8'
        ], [
            'name.required' => 'Username harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah dipakai',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin'
        ]);

        return to_route('admin.data.user')->with('success', 'Berhasil menambah data');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $data = [
            'user' => $user,
            'active' => 'data-user'
        ];

        return view('admin.user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); // Temukan user yang akan dihapus

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ], [
            'name.required' => 'Username harus diisi',
            'email.required' => 'Email harus diisi',
        ]);

        if ($request->password != null) {

            $request->validate([
                'password' => 'min:8'
            ], [
                'password.min' => 'Password minimal 8 karakter',
            ]);

            $data['password'] = Hash::make($request->password);
        }

        if ($request->email != $user->email) {
            $request->validate([
                'email' => 'unique:users,email',
            ], [
                'email.unique' => 'Email sudah dipakai',
            ]);
        }

        User::where('id', $id)->update($data);

        return to_route('admin.data.user')->with('success', 'Berhasil mengubah data');
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id); // Temukan user yang akan dihapus

            // Hapus user dari tabel user
            $user->delete();

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
