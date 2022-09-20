<!DOCTYPE html>
<html>

<head>
    <title>Surat Keterangan Usaha > {{ $business_info['name'] }} - {{ config('app.name', 'Laravel') }}</title>
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
        <p class="h4 mb-0"><u>SURAT KETERANGAN USAHA</u></p>
        <p>Nomor : 140/{{$business_info['id']}}/VII/{{now()->isoFormat('YYYY')}}</p>
    </div>
    <p class="mt-5">Yang bertanda tangan dibawah ini</p>
    <table>
        <tr>
            <td>Nama</td>
            <td><span class="pl-5 pr-1">:</td>
            <td>MOKH. BUSTANUL ARIFIN</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td><span class="pl-5 pr-1">:</td>
            <td>Sekertaris Desa</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><span class="pl-5 pr-1">:</td>
            <td>Desa Gumelem Wetan RT 002 RW 007 Kecamatan Susukan</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><span class="pl-5 pr-1">&nbsp;</td>
            <td>Kabupaten Banjarnegara</td>
        </tr>
    </table>
    <p>Menerangkan bahwa :</p>
    <table>
        <tr>
            <td>Nama</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ $business_info['name'] }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ $business_info['identity_number'] }}</td>
        </tr>
        <tr>
            <td>Tempat Tanggal Lahir</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ $business_info['birth_place'] }}, {{ Carbon\Carbon::parse($business_info['birth_date'])->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td><span class="mr-3">{{ $business_info['address'] }} RT. {{ $business_info['rt'] }}</span>RW. {{ $business_info['rw'] }}</td>
        </tr>
    </table>
    <p>Benar-benar memiliki Usaha di Desa Gumelem Wetan :</p>
    <table>
        <tr>
            <td>Jenis Usaha</td>
            <td><span class="pl-1 pr-1">:</span></td>
            <td>{{ $business_info['jenisusaha'] }}</td>
        </tr>
        <tr>
            <td>Jenis Barang/Jasa Dagangan</td>
            <td><span class="pl-1 pr-1">:</span></td>
            <td>{{ $business_info['jenisbarang'] }}</td>
        </tr>
        <tr>
            <td>Mulai Usaha Tahun</td>
            <td><span class="pl-1 pr-1">:</span></td>
            <td>{{ $business_info['mulaiusaha'] }}</td>
        </tr>
        <tr>
            <td>Lokasi Usaha</td>
            <td><span class="pl-1 pr-1">:</span></td>
            <td>{{ $business_info['lokasiusaha'] }}</td>
        </tr>
    </table>
    <p class="mt-2">Demikian surat keterangan ini di buat dengan sebenar-benarnya untuk dapat di pergunakan sebagaimana perlunya.</p>
    <table class="w-100 mt-5">
        <tr>
            <td style="width: 60%">&nbsp;</td>
            <td style="width: 40%">
                <p class="mb-0">Gumelem Wetan, {{ now()->isoFormat('DD MMMM YYYY') }}</p>
                <p class="mb-0">a.n. Kepala Desa Gumelem Wetan</p>
                <p class="mb-0 pl-5">Sekertaris Desa</p>
                <div class="pt-1">&nbsp;</div>
                <p class="mt-5 font-weight-bold ml-1"><u>MOKH. BUSTANUL ARIFIN</u></p>
            </td>
        </tr>
    </table>
</body>

</html>
