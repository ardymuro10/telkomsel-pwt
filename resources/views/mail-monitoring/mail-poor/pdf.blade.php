<!DOCTYPE html>
<html>

<head>
    <title>Surat Keterangan Miskin > {{ $mail_poor['name'] }} - {{ config('app.name', 'Laravel') }}</title>
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
        <p class="h4 mb-0"><u>SURAT KETERANGAN TIDAK MAMPU</u></p>
        <p>Nomor : 460/{{$mail_poor['id']}}/V/{{now()->isoFormat('YYYY')}}</p>
    </div>
    <p class="mt-5">Yang bertanda tangan dibawah ini : </p>
    <table>
        <tr>
            <td>Nama</td>
            <td><span class="pl-5 pr-1">:</td>
            <td>CARTUN</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td><span class="pl-5 pr-1">:</td>
            <td>Kepala Desa</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><span class="pl-5 pr-1">:</td>
            <td>Desa Gumelem Wetan  RT 002 RW 007 Kecamatan Susukan</td>
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
            <td>{{ $mail_poor['name'] }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ Str::title($mail_poor['gender']) }}</td>
        </tr>
        <tr>
            <td>Nomor NIK</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ Str::title($mail_poor['identity_number']) }}</td>
        </tr>
        <tr>
            <td>Tempat Tanggal Lahir</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ $mail_poor['birth_place'] }}, {{ Carbon\Carbon::parse($mail_poor['birth_date'])->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ Str::title($mail_poor['occupation']) }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td><span class="mr-3">{{ $mail_poor['address'] }} RT. {{ $mail_poor['rt'] }}</span>RW. {{ $mail_poor['rw'] }}</td>
        </tr>
    </table>
    <p class="mt-3 mb-0">Adalah benar-benar warga desa kami dan termasuk dalam kategori Keluarga Miskin/Keluarga Tidak Mampu.</p>
    <p>Surat Keterangan ini dikeluarkan untuk keperluan mengajukan permohonan {{ $mail_poor['necessity']}}.</p>
    <p>Demikian Surat Keterangan ini dikeluarkan untuk dipergunakan sebagaimana perlunya.</p>
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
