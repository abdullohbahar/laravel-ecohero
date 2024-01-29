@extends('landing.layout.app')

@section('title')
@endsection

@push('addons-css')
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-bottom: 100px;">
        <img src="{{ asset('./assets/dist/img/search.jpg') }}" class="img-fluid">

        <!-- Main content -->
        <div class=" text-center">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-4 font-weight-normal">Trace & Track</h1>
                <p class="lead font-weight-normal">Masukkan nomor resi untuk tracking pengiriman barang kamu disini
                    secara real time dan akurat.

                </p>
                <form action="" method="GET">
                    <input type="resi" name="resi" value="{{ $resi }}" class="form-control" id="resi"
                        placeholder="Input Nomor Resi Anda"> <br>
                    <button type="submit" id="search" class="btn btn-primary">Search</button>
                </form>
            </div>

        </div>
        @if ($resi)
            @if ($trackingData)
                @include('landing.result')
            @else
                <center>
                    <h3 id="scroll"><b>Nomor Resi Tidak Ditemukan</b></h3>
                </center>
            @endif
        @endif
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('addons-js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Ganti 'targetId' dengan ID elemen yang ingin di-scroll
            var targetId = "scroll";

            // Cek apakah elemen dengan ID yang ditentukan ada di halaman
            var targetElement = document.getElementById(targetId);

            // Jika elemen ditemukan, lakukan scroll otomatis
            if (targetElement) {
                // Ganti 'behavior' dan 'block' sesuai kebutuhan
                targetElement.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });
            }
        });
    </script>
@endpush
