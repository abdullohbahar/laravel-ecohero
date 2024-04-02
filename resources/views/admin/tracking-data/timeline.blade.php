@extends('admin.layout.app')

@section('title')
    Update Location Tracking
@endsection

@push('addons-css')
    <link rel="stylesheet" href="{{ asset('./assets/css/timeline.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
    @php
        \Carbon\Carbon::setLocale('en');
    @endphp
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Update Location | Resi Number: {{ $trackingData->resi_number }}</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Update Location | Resi Number:
                                {{ $trackingData->resi_number }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td colspan="2">
                                                <b>Resi Number: <span id="noResi">{{ $trackingData->resi_number }}</span>
                                                </b>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Kurir</td>
                                            <td>
                                                <b>
                                                    <span id="kurir">{{ $trackingData->courier }}</span>
                                                </b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Delivery Date</td>
                                            <td>
                                                <b>
                                                    <span id="sent_date">
                                                        {{ \Carbon\Carbon::parse($trackingData->delivery_date)->translatedFormat('l, d F Y') }}</span>
                                                </b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sender Name</td>
                                            <td>
                                                <b>
                                                    <span id="sent_date">{{ $trackingData->customer->first_name }}
                                                        {{ $trackingData->customer->last_name }}</span>
                                                </b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Origin</td>
                                            <td>
                                                <b>
                                                    <span id="sent_date">{{ $trackingData->origin }}</span>
                                                </b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Destination</td>
                                            <td>
                                                <b>
                                                    <span id="sent_date">{{ $trackingData->destination }}</span>
                                                </b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Current Status</td>
                                            <td>
                                                <b>
                                                    <span id="sent_date"
                                                        class="text-capitalize">{{ $trackingData->timelines?->first() != null ? $trackingData->timelines->first()->status : '-' }}</span>
                                                </b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-header">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add
                                    Timeline</button>
                            </div>
                            <div class="card-body">
                                <ul class="timeline">
                                    @forelse ($trackingData->timelines as $timeline)
                                        <li class="event">
                                            <div class="member-infos">
                                                <h1 class='member-title'>
                                                    {{ \Carbon\Carbon::parse($timeline->tanggal)->translatedFormat('l, d F Y') }}
                                                    | {{ \Carbon\Carbon::parse($timeline->jam)->format('H:i') }}</h1>
                                                <h5 class="text-capitalize"><b>{{ $timeline->status }}</b></h5>
                                                <p class="text-capitalize"> {{ $timeline->asal }}
                                                    {{ ' - ' . $timeline->tujuan }}</p>
                                                <div class="row mt-2">
                                                    <div class="col-12">
                                                        <button class="btn btn-sm btn-warning" id="editBtn"
                                                            data-id="{{ $timeline->id }}"
                                                            data-tanggal="{{ $timeline->tanggal }}"
                                                            data-jam="{{ \Carbon\Carbon::parse($timeline->jam)->format('H:i') }}"
                                                            data-status="{{ $timeline->status }}"
                                                            data-asal="{{ $timeline->asal }}"
                                                            data-tujuan="{{ $timeline->tujuan }}">Edit</button>
                                                        <button class="btn btn-sm btn-danger" data-id="{{ $timeline->id }}"
                                                            id="removeBtn">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <h1>No Timeline yet</h1>
                                    @endforelse
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('admin.tracking-data.components.modal-add')
    @include('admin.tracking-data.components.modal-edit')
@endsection

@push('addons-js')
    @if (old('modal') == 'add')
        <script>
            $("#add").modal("show")
        </script>
    @elseif(old('modal') == 'edit')
        <script>
            var jam = `{{ old('editJam') }}`;
            flatpickr('#editJam', {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                defaultDate: jam // Nilai default, bisa diubah sesuai kebutuhan
            });


            $("#edit").modal("show")
        </script>
    @endif

    <script>
        $("body").on("click", "#editBtn", function() {
            $("#edit").modal("show")

            $("#timelineID").val($(this).data("id"))
            $("#editTanggal").val($(this).data("tanggal"))
            var jam = $(this).data("jam");
            flatpickr('#editJam', {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                defaultDate: jam // Nilai default, bisa diubah sesuai kebutuhan
            });
            $("#editStatus").val($(this).data("status"))
            $("#editAsal").val($(this).data("asal"))
            $("#editTujuan").val($(this).data("tujuan"))
        })

        var token = $('meta[name="csrf-token"]').attr('content');

        // destroy anak asuh
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            }
        });
        $("body").on("click", "#removeBtn", function() {
            var id = $(this).data("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang berhubungan akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/tracking-data/destroy-timeline/' + id,
                        type: 'DELETE',
                        success: function(response) {
                            if (response.code == 200) {
                                Swal.fire(
                                    'Berhasil!',
                                    response.message,
                                    'success'
                                ).then(() => {
                                    location
                                        .reload(); // Refresh halaman setelah mengklik OK
                                });
                            } else if (response.code == 500) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: response.message,
                                })
                            }
                        }
                    })
                }
            })
        })
    </script>
@endpush
