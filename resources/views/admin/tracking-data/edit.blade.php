@extends('admin.layout.app')

@section('title')
    Edit Data Tracking List
@endsection

@push('addons-css')
    <style>
        .select2-selection.select2-selection--single {
            height: 38px !important;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Data Tracking List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Data Tracking List</li>
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
                                <form action="{{ route('admin.update.tracking.data', $trackingData->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <h2>
                                                Customer
                                            </h2>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label>Sender Name</label>
                                            <select name="customer_id"
                                                class="select2 form-control @error('customer_id') is-invalid @enderror"
                                                style="width: 100%" id="customer" required>
                                                <option value="">-- Choose Sender --</option>
                                                @foreach ($customers as $customer)
                                                    <option
                                                        {{ old('customer_id', $trackingData->customer_id) == $customer->id ? 'selected' : '' }}
                                                        value="{{ $customer->id }}">{{ $customer->first_name }}
                                                        {{ $customer->last_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('customer_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" disabled
                                                id="email">
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone_number" class="form-control" disabled
                                                id="phone_number">
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label>Country</label>
                                            <input type="text" name="" class="form-control" disabled
                                                id="country">
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label>Street Address</label>
                                            <input type="text" name="" class="form-control" disabled
                                                id="street_address">
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label>Town</label>
                                            <input type="text" name="" class="form-control" disabled
                                                id="town">
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label>Province</label>
                                            <input type="text" name="" class="form-control" disabled
                                                id="province">
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label>Post Code</label>
                                            <input type="text" name="" class="form-control" disabled
                                                id="post_code">
                                        </div>
                                        <div class="col-12">
                                            <hr>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label>Resi Number</label>
                                            <input type="text" name="resi_number"
                                                class="form-control @error('resi_number') is-invalid @enderror"
                                                value="{{ old('resi_number', $trackingData->resi_number) }}" required>
                                            @error('resi_number')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label>Courier</label>
                                            <input type="text" name="courier"
                                                class="form-control @error('courier') is-invalid @enderror"
                                                value="{{ old('courier', $trackingData->courier) }}" required>
                                            @error('courier')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label>Delivery Date</label>
                                            <input type="date" name="delivery_date"
                                                class="form-control @error('delivery_date') is-invalid @enderror"
                                                value="{{ old('delivery_date', $trackingData->delivery_date) }}" required>
                                            @error('delivery_date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label>Origin</label>
                                            <input type="text" name="origin"
                                                class="form-control @error('origin') is-invalid @enderror"
                                                value="{{ old('origin', $trackingData->origin) }}" required>
                                            @error('origin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label>Destionation</label>
                                            <input type="text" name="destination"
                                                class="form-control @error('destination') is-invalid @enderror"
                                                value="{{ old('destination', $trackingData->destination) }}" required>
                                            @error('destination')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <button style="width: 100%" class="btn btn-success"
                                                type="submit">Save</button>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('.select2').select2();

        $("#customer").on("change", function() {
            var id = $(this).val()
            getCustomer(id)
        })

        $(window).on('load', function() {
            var id = $("#customer").val()
            getCustomer(id)
        })

        function getCustomer(id) {
            $.ajax({
                url: '/admin/tracking-data/get-customer/' + id,
                method: "GET",
                dataType: "JSON",
                success: function(response) {
                    console.log(response.data)
                    $("#email").val(response.data.customer.email)
                    $("#phone_number").val(response.data.customer.phone_number)
                    $("#country").val(response.data.customer.country)
                    $("#street_address").val(response.data.customer.street_address)
                    $("#town").val(response.data.customer.town)
                    $("#province").val(response.data.customer.province)
                    $("#post_code").val(response.data.customer.post_code)
                }
            })
        }
    </script>
@endpush
