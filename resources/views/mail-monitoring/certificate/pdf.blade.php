<!DOCTYPE html>
<html>

<head>
    <title>Surat Keterangan > {{ $certificate['name'] }} - {{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        *.{
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>

<body>
    <div class="w-100 text-center position-relative">
        <img src="{{ asset('img/blangko.png') }}" alt="logo desa" class="position-absolute" style="height: 72px; top: 12px; left: 22px">
        <p class="h5 mb-0">PEMERINTAH KABUPATEN BANJARNEGARA</p>
        <p class="h5 mb-0">KECAMATAN SUSUKAN</p>
        <p class="h5 mb-0">DESA GUMELEM WETAN</p>
        <p><u>Alamat : Jalan Raya Gumelem Wetan Kec. Susukan Kab. Banjarnegara 53475</u></p>
    </div>
    <div class="w-100 text-center">
        <p class="h4 mb-0" style="font-style: italic"><u>SURAT KETERANGAN DOMISILI</u></p>
        <p>Nomor : 470/{{$certificate['id']}}/XII/{{now()->isoFormat('YYYY')}}</p>
    </div>
    <table class="mb-5 mt-5">
        <tr>
            <td colspan="3">
                <p>Yang bertanda tangan di bawah ini :</p>
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>MOKH. BUSTANUL ARIFIN</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>Sekretaris  Desa</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>RT 002 RW 007 Desa Gumelem Wetan Kecamatan Susukan</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>Kabupaten Banjarnegara</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">
                <p>Menerangkan bahwa :</p>
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td class="font-weight-bold">{{ $certificate['name'] }}</td>
        </tr>
        <tr>
            <td>Nomor NIK</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ $certificate['identity_number'] }}</td>
        </tr>
        <tr>
            <td>Tempat/tanggal lahir</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ $certificate['birth_place'] }}, {{ Carbon\Carbon::parse($certificate['birth_date'])->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ Str::title($certificate['gender']) }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ Str::title($certificate['religion']) }}</td>
        </tr>
        <tr>
            <td>Kewarganegaraan</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ Str::upper($certificate['nationality']) }}</td>
        </tr>
        <tr>
            <td><span class="text-nowrap">Bertempat Tinggal di</span></td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td><span class="mr-3">RT. {{ $certificate['rt'] }}</span>RW. {{ $certificate['rw'] }}</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>{{ $certificate['address'] }}</td>
        </tr>
    </table>
    <p class="mb-5">Demikian Surat Keterangan ini dikeluarkan untuk dapat dipergunakan sebagaimana perlunya.</p>
    <div class="position-relative">
        <div class="text-center position-absolute" style="right: 5rem;">
            <p class="mb-0">Gumelem Wetan, {{ now()->isoFormat('DD MMMM YYYY') }}</p>
            <p class="mb-0">a.n Kepala Desa Gumelem Wetan</p>
            <p class="mb-5 pb-5">Sekretaris Desa</p>
            <p class="font-weight-bold"><u>MOKH. BUSTANUL ARIFIN</u></p>
        </div>
    </div>
</body>

</html>
