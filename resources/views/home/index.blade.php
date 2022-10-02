<? php
use Carbon\Carbon;

?>

<div class="row">
    <div class="col-4">
        <div class="small-box">
            <div class="inner">
                <h4>Total Data : {{ $totalData }}</h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6" style="text-align: center">
        <div class="small-box">
            <div class="inner">
                <a type="submit">
                    <h4><b>Upload</b></h4>
                    <img src="{{ asset('img/upload.png') }}" height="200">
                </a>
                {{-- <a type="submit" class="fas fa-file-upload">File Excel</a> --}}
            </div>
        </div>
    </div>
    <div class="col-6" style="text-align: center">
        <div class="small-box">
            <div class="inner">
                <a type="submit">
                    <h4><b>Download</b></h4>
                    <img src="{{ asset('img/download.png') }}" height="200">
                </a>
                {{-- <a type="submit" class="fas fa-file-upload">File Excel</a> --}}
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

