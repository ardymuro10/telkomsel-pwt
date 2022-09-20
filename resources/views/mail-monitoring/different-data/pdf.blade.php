<!DOCTYPE html>
<html>

<head>
    <title>Surat Beda Data > {{ $different_data['name'] }} - {{ config('app.name', 'Laravel') }}</title>
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
        <p class="h4 mb-0"><u>SURAT KETERANGAN BEDA DATA</u></p>
        <p>Nomor : 140/{{$different_data['id']}}/VIII/{{now()->isoFormat('YYYY')}}</p>
    </div>
    <p class="mt-5">Yang bertanda tangan dibawah ini Kepala Desa Gumelem Wetan Kecamatan Susukan Kabupaten Banjarnegara, menerangkan bahwa : </p>
    <table>
        <tr>
            <td>Data-data :</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ $different_data['name'] }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ Str::title($different_data['gender']) }}</td>
        </tr>
        <tr>
            <td>Tempat Tanggal Lahir</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ $different_data['birth_place'] }}, {{ Carbon\Carbon::parse($different_data['birth_date'])->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td><span class="mr-3">{{ $different_data['address'] }} RT. {{ $different_data['rt'] }}</span>RW. {{ $different_data['rw'] }}</td>
        </tr>
    </table>
    <table>
        <tr>
            <td>Sebagaimana tertera dalam Dokumen</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>KTP-El</td>
        </tr>
        <tr>
            <td class="text-right">NIK</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ $different_data['identity_number'] }}</td>
        </tr>
        <tr>
            <td colspan="3">Adalah data-data dari orang yang sama sebagaimana tertera dalam :</td>
        </tr>
        <tr>
            <td class="text-right">Dokumen</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ $different_data['document'] }}</td>
        </tr>
        <tr>
            <td class="text-right">Nomor</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ $different_data['number'] }}</td>
        </tr>
    </table>
    <p class="mb-0">Data - data tersebut adalah satu orang yang sama.</p>
    <p class="mb-0">Demikian surat keterangan ini dikeluarkan untuk dapat dipergunakan sebagaimana perlunya.</p>
    <table class="w-100 mt-5">
        <tr>
            <td style="width: 60%">&nbsp;</td>
            <td style="width: 40%">
                <p class="mb-0">Dikeluarkan di : Gumelem Wetan</p>
                <p class="mb-0">Pada Tanggal : {{ now()->isoFormat('DD MMMM YYYY') }}</p>
                <p class="mb-3">Kepala Desa Gumelem Wetan</p>
                <div class="pt-1">&nbsp;</div>
                <p class="mt-5 font-weight-bold pl-5 ml-2"><u>CARTUN</u></p>
            </td>
        </tr>
    </table>
</body>

</html>
