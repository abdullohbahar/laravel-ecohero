@extends('admin.layout.app')

@section('title')
    Tambah Data Pelanggan
@endsection

@push('addons-css')
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Data Pelanggan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Data Pelanggan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('admin.store.customer') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label for="">Nama Awal</label>
                                            <input type="text" name="first_name" value="{{ old('first_name') }}"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                id="">
                                            @error('first_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label for="">Nama Belakang</label>
                                            <input type="text" name="last_name" value="{{ old('last_name') }}"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                id="">
                                            @error('last_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label for="">Email</label>
                                            <input type="text" name="email" value="{{ old('email') }}"
                                                class="form-control @error('email') is-invalid @enderror" id="">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label for="">Nomor HP</label>
                                            <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                id="">
                                            @error('phone_number')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label for="">Negara</label>
                                            <input type="text" name="country" value="{{ old('country') }}"
                                                class="form-control @error('country') is-invalid @enderror" id="">
                                            @error('country')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label for="">Jalan</label>
                                            <input type="text" name="street_address" value="{{ old('street_address') }}"
                                                class="form-control @error('street_address') is-invalid @enderror"
                                                id="">
                                            @error('street_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label for="">Kota</label>
                                            <input type="text" name="town" value="{{ old('town') }}"
                                                class="form-control @error('town') is-invalid @enderror" id="">
                                            @error('town')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label for="">Provinsi</label>
                                            <input type="text" name="province" value="{{ old('province') }}"
                                                class="form-control @error('province') is-invalid @enderror" id="">
                                            @error('province')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label for="">Kode Pos</label>
                                            <input type="text" name="post_code" value="{{ old('post_code') }}"
                                                class="form-control @error('post_code') is-invalid @enderror"
                                                id="">
                                            @error('post_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                            <button class="btn btn-success" style="width: 100%">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection

@push('addons-js')
@endpush
