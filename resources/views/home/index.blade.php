<? php
use Carbon\Carbon;
?>
<div>
    <x-flash-message/>

    <div class="row">

        <div class="col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h4 class="font-weight-bold card-header">Data Program JPP</h4>
                    <h5 class="card-body">Total Data : {{ $totalData }}</h5>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h4 class="font-weight-bold card-header">Monitoring Site Id</h4>
                    <div class="row" style="margin: 8px">
                        <div class="small-box col-3 bg-light" style="margin: inherit">
                            <div class="inner">
                                <h5 class="font-weight-bold">Status</h5>
                                <h6><i class="fas fa-circle" style="color: yellow"></i> Open : {{ $countOpen }}</h6>
                                <h6><i class="fas fa-circle" style="color: #1E90FF"></i> On Progres : {{ $countOgp }}</h6>
                                <h6><i class="fas fa-circle" style="color:#32CD32"></i> Close : {{ $countClose }}</h6>
                            </div>
                        </div>
                        <div class="small-box col-8 bg-light" style="margin: inherit">
                            <div class="inner">
                                <table class="table table-bordered" style="margin: inherit">
                                    <thead>
                                        <tr>
                                            <th scope="col" rowspan="2" class="align-middle border-dark" style="text-align: center">Type Infra</th>
                                            <th scope="col" colspan="3" style="text-align: center" class="border-dark">Status</th>
                                        </tr>
                                        <tr style="text-align: center">
                                            <th scope="col" class="border-dark bg-info">Open</th>
                                            <th scope="col" class="border-dark bg-primary">OGP</th>
                                            <th scope="col" class="border-dark bg-success">Close</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="border-dark" scope="row">Easy Pole</th>
                                            <td class="border-dark">{{$countEasyOpen}}</td>
                                            <td class="border-dark">{{$countEasyOgp}}</td>
                                            <td class="border-dark">{{$countEasyclose}}</td>
                                        </tr>
                                        <tr>
                                            <th class="border-dark" scope="row">Black Site</th>
                                            <td class="border-dark">{{$countBlackopen}}</td>
                                            <td class="border-dark">{{$countBlackogp}}</td>
                                            <td class="border-dark">{{$countBlackclose}}</td>
                                        </tr>
                                        <tr>
                                            <th class="border-dark" scope="row">Repeater</th>
                                            <td class="border-dark">{{$countRepeatopen}}</td>
                                            <td class="border-dark">{{$countRepeatogp}}</td>
                                            <td class="border-dark">{{$countRepeatclose}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-body">Total Data : {{ $totalDataMonitoring }}</h5>
                </div>
                <a href="{{ route('monitoring') }}" class="small-box-footer bg-primary">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>

</div>


{{-- <div class="row" wire:poll="checkData">
    <meta http-equiv="refresh" content="3" >
    <div class="col-6 col-md-3">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $cover_letters->count() }}</h3>
                <p>Surat Pengantar</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope"></i>
            </div>
            <a href="{{ route('mail-monitoring.cover-letter') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Data Terbaru</h3><br/>
                <small class="text-white mb-0 font-weight-bold" style="font-style: italic;">Surat Pengantar</small>
            </div>
            <div class="card-body">
                @forelse ($cover_letters as $cover)
                    @if ($loop->iteration <= 5)
                    <div class="border-bottom">
                        <p class="font-weight-bold mb-0">{{ $cover->name }}</p>
                        <small class="text-muted mb-0" style="font-style: italic;">{{ \Carbon\Carbon::createFromTimestamp(strtotime($cover->created_at))->format('d-m-Y H:i:s') }}</small>
                        <small class="text-muted mb-0">| <b>{{ $cover->status }}</b></small>
                    </div>
                    @endif
                @empty
                    <p class="text-center">Tidak ada data</p>
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $certificates->count() }}</h3>
                <p>Surat Keterangan Domisili</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope"></i>
            </div>
            <a href="{{ route('mail-monitoring.certificate') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Data Terbaru</h3><br/>
                <small class="text-white mb-0 font-weight-bold" style="font-style: italic;">Surat Keterangan Domisili</small>
            </div>
            <div class="card-body">
                @forelse ($certificates as $certi)
                    @if ($loop->iteration <= 5)
                    <div class="border-bottom">
                        <p class="font-weight-bold mb-0">{{ $certi->name }}</p>
                        <small class="text-muted mb-0" style="font-style: italic;">{{ \Carbon\Carbon::createFromTimestamp(strtotime($certi->created_at))->format('d-m-Y H:i:s') }}</small>
                        <small class="text-muted mb-0">| <b>{{ $certi->status }}</b></small>
                    </div>
                    @endif
                @empty
                    <p class="text-center">Tidak ada data</p>
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $different_data->count() }}</h3>
                <p>Surat Beda Data</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope"></i>
            </div>
            <a href="{{ route('mail-monitoring.different-data') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Data Terbaru</h3><br/>
                <small class="text-light mb-0 font-weight-bold" style="font-style: italic;">Surat Beda Data</small>
            </div>
            <div class="card-body">
                @forelse ($different_data as $different)
                    @if ($loop->iteration <= 5)
                    <div class="border-bottom">
                        <p class="font-weight-bold mb-0">{{ $different->name }}</p>
                        <small class="text-muted mb-0" style="font-style: italic;">{{ Carbon\Carbon::createFromTimestamp(strtotime($different->created_at))->format('d-m-Y H:i:s') }}</small>
                        <small class="text-muted mb-0">| <b>{{ $different->status }}</b></small>
                    </div>
                    @endif
                @empty
                    <p class="text-center">Tidak ada data</p>
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $business_info->count() }}</h3>
                <p>Surat Keterangan Usaha</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope"></i>
            </div>
            <a href="{{ route('mail-monitoring.business-info') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Data Terbaru</h3><br/>
                <small class="text-light mb-0 font-weight-bold" style="font-style: italic;">Surat Keterangan Usaha</small>
            </div>
            <div class="card-body">
                @forelse ($business_info as $business)
                    @if ($loop->iteration <= 5)
                    <div class="border-bottom">
                        <p class="font-weight-bold mb-0">{{ $business->name }}</p>
                        <small class="text-muted mb-0" style="font-style: italic;">{{ Carbon\Carbon::createFromTimestamp(strtotime($business->created_at))->format('d-m-Y H:i:s') }}</small>
                        <small class="text-muted mb-0">| <b>{{ $business->status }}</b></small>
                    </div>
                    @endif
                @empty
                    <p class="text-center">Tidak ada data</p>
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $mail_poor->count() }}</h3>
                <p>Surat Keterangan Miskin</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope"></i>
            </div>
            <a href="{{ route('mail-monitoring.mail-poor') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Data Terbaru</h3><br/>
                <small class="text-light mb-0 font-weight-bold" style="font-style: italic;">Surat Keterangan Miskin</small>
            </div>
            <div class="card-body">
                @forelse ($mail_poor as $poor)
                    @if ($loop->iteration <= 5)
                    <div class="border-bottom">
                        <p class="font-weight-bold mb-0">{{ $poor->name }}</p>
                        <small class="text-muted mb-0" style="font-style: italic;">{{ Carbon\Carbon::createFromTimestamp(strtotime($poor->created_at))->format('d-m-Y H:i:s') }}</small>
                        <small class="text-muted mb-0">| <b>{{ $poor->status }}</b></small>
                    </div>
                    @endif
                @empty
                    <p class="text-center">Tidak ada data</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $death_person->count() }}</h3>
                <p>Data Orang Meninggal</p>
            </div>
            <div class="icon">
                <i class="fas fa-archway"></i>
            </div>
            <a href="{{ route('death-person') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title">Data Terbaru</h3><br/>
                <small class="text-white mb-0 font-weight-bold" style="font-style: italic;">Data Orang Meninggal</small>
            </div>
            <div class="card-body">
                @forelse ($death_person as $death_people)
                    @if ($loop->iteration <= 5)
                    <div class="border-bottom">
                        <p class="font-weight-bold mb-0">{{ $death_people->name }}</p>
                        <small class="text-muted mb-0" style="font-style: italic;">{{ \Carbon\Carbon::parse($death_people->created_at)->format('d-m-Y H:i:s') }}</small>
                    </div>
                    @endif
                @empty
                    <p class="text-center">Tidak ada data</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $public_complaints->count() }}</h3>
                <p>Pengaduan Masyarakat</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-signature"></i>
            </div>
            <a href="{{ route('public-complaints') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        <div class="card">
            <div class="card-header bg-success">
                <h3 class="card-title">Data Terbaru</h3><br/>
                <small class="text-white mb-0 font-weight-bold" style="font-style: italic;">Data Pengaduan Masyarakat</small>
            </div>
            <div class="card-body">
                @forelse ($public_complaints as $public_complaint   )
                    @if ($loop->iteration <= 5)
                    <div class="border-bottom">
                        <p class="font-weight-bold mb-0">{{ $public_complaint->name }}</p>
                        <small class="text-muted mb-0" style="font-style: italic;">{{ Carbon\Carbon::createFromTimestamp(strtotime($public_complaint->created_at))->format('d-m-Y H:i:s') }}</small>
                    </div>
                    @endif
                @empty
                    <p class="text-center">Tidak ada data</p>
                @endforelse
            </div>
        </div>
    </div>
</div> --}}

