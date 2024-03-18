@php
    \Carbon\Carbon::setLocale('id');
@endphp
<div class="container" id="result">
    <div class="row" id="scroll">
        <div class="col-sm-12 col-md-6">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td colspan="2">
                            <b>Nomor Resi: <span id="noResi">{{ $trackingData->resi_number }}</span>
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
                        <td>Tanggal Pengiriman</td>
                        <td>
                            <b>
                                <span id="sent_date">
                                    {{ \Carbon\Carbon::parse($trackingData->delivery_date)->translatedFormat('l, d F Y') }}</span>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Pengirim</td>
                        <td>
                            <b>
                                <span id="sent_date">{{ $trackingData->customer->first_name }}
                                    {{ $trackingData->customer->last_name }}</span>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td>Asal</td>
                        <td>
                            <b>
                                <span id="sent_date">{{ $trackingData->origin }}</span>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td>Tujuan</td>
                        <td>
                            <b>
                                <span id="sent_date">{{ $trackingData->destination }}</span>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td>Status Terbaru</td>
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
        <div class="col-sm-12 col-md-6">
            <div id="content">
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
                            </div>
                        </li>
                    @empty
                        <h1>Belum ada Timeline</h1>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>