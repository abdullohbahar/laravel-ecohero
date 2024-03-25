@extends('admin.layout.app')

@section('title')
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
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $totalCustomer }}</h3> <!-- Mengambil jumlah total pelanggan dari database -->
                                <p>Total Customers</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="{{ route('admin.customer') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- ./col -->

                  <div class="col-lg-3 col-md-6 col-sm-12">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $amountOfData }}</h3>
                            <p>Amount of Data</p> <!-- Anda bisa mengganti "Data" dengan kata yang relevan -->
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                            <i class="fas fa-database"></i> <!-- Icon untuk melambangkan data -->
                        </div>
                        <a href="{{ route('admin.tracking.data') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                    <!-- ./col -->

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 style="color: white;">{{ $dataProcessing }}</h3>
                            <p style="color: white;">Data Processing</p> 
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                            <i class="fas fa-cog"></i> <!-- Ikon yang merepresentasikan proses -->
                        </div>
                       <a href="{{ route('admin.tracking.data') }}" class="small-box-footer" style="color: white;">More info <i class="fas fa-arrow-circle-right"></i></a>

                    </div>
                </div>

                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section> <!-- /.content -->
    </div>
@endsection

@push('addons-js')
@endpush
