<!DOCTYPE html>
<html>

<head>
    <title>Surat Pengantar > {{ $cover_letter['name'] }} - {{ config('app.name', 'Laravel') }}</title>
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
        <p class="h5 mb-0">SEKRETARIAT DESA GUMELEM WETAN</p>
        <p><u>Alamat : Jalan Raya Gumelem Wetan Kec. Susukan Kab. Banjarnegara 53475</u></p>
    </div>
    <p><small>No.Kode Desa : 33.04.01.2003.</small></p>
    <div class="w-100 text-center">
        <p class="h4 mb-0"><u>SURAT PENGANTAR</u></p>
        <p>Nomor : 470/{{$cover_letter['id']}}/XI/{{now()->isoFormat('YYYY')}}</p>
    </div>
    <p class="mt-5">Yang bertanda tangan di bawah ini menerangkan bahwa :</p>
    <table class="mb-5">
        <tr>
            <td>1.</td>
            <td>Nama Lengkap</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ $cover_letter['name'] }}</td>
        </tr>
        <tr>
            <td>2.</td>
            <td>Nomor NIK</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ $cover_letter['identity_number'] }}</td>
        </tr>
        <tr>
            <td>3.</td>
            <td>Jenis Kelamin</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ Str::title($cover_letter['gender']) }}</td>
        </tr>
        <tr>
            <td>4.</td>
            <td>Tempat Tanggal Lahir</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ $cover_letter['birth_place'] }}, {{ Carbon\Carbon::parse($cover_letter['birth_date'])->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td>5.</td>
            <td>Warga Negara</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ Str::title($cover_letter['nationality']) }}</td>
        </tr>
        <tr>
            <td>6.</td>
            <td>Agama</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ Str::title($cover_letter['religion']) }}</td>
        </tr>
        <tr>
            <td>7.</td>
            <td>Status Perkawinan</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ Str::title($cover_letter['marriage_status']) }}</td>
        </tr>
        <tr>
            <td>8.</td>
            <td>Pekerjaan</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ Str::title($cover_letter['occupation']) }}</td>
        </tr>
        <tr>
            <td>9.</td>
            <td>Pendidikan</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ Str::upper($cover_letter['education']) }}</td>
        </tr>
        <tr>
            <td>10.</td>
            <td>Alamat</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td><span class="mr-3">RT. {{ $cover_letter['rt'] }}</span>RW. {{ $cover_letter['rw'] }}</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
            <td>{{ $cover_letter['address'] }}</td>
        </tr>
        <tr>
            <td>11.</td>
            <td>Surat Bukti Diri</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ $cover_letter['proof_of_self'] }}</td>
        </tr>
        <tr>
            <td>12.</td>
            <td>Keperluan</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ $cover_letter['necessity'] }}</td>
        </tr>
        <tr>
            <td>13.</td>
            <td>Berlaku Mulai</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ Carbon\Carbon::parse($cover_letter['valid_from'])->isoFormat('DD MMMM YYYY') }} s/d Selesai</td>
        </tr>
        <tr>
            <td>14.</td>
            <td>Keterangan</td>
            <td><span class="pl-5 pr-1">:</span></td>
            <td>{{ $cover_letter['description'] }}</td>
        </tr>
    </table>
    <p>Demikian untuk menjadikan maklum  kepada yang berkepentingan </p>
    <table class="w-100 text-center">
        <tr>
            {{-- <td style="width: 35%">&nbsp;</td>
            <td style="width: 30%">
                <p class="mb-0">Nomor : 470/1604/XI/2019</p>
                <p class="mb-0">Tanggal : {{ Carbon\Carbon::parse($cover_letter['created_at'])->isoFormat('DD MMMM YYYY') }}</p>
            </td> --}}
            <td style="width: 30%">&nbsp;</td>
            <td style="width: 30%">&nbsp;</td>
                <p class="mb-0">Gumelem Wetan, {{ now()->isoFormat('DD MMMM YYYY') }}</p>
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <p class="mb-0">&nbsp;</p>
                <p class="mb-5 pb-5">PEMOHON</p>
            </td>
            <td style="width: 30%">
                <p class="mb-0">Mengetahui</p>
                <p class="mb-5 pb-5">Camat Susukan</p>
            </td>
            <td style="width: 35%">
                <p class="mb-0">a.n. Kepala Desa Gumelem Wetan</p>
                <p class="mb-5 pb-5">Sekretaris Desa</p>
            </td>
        </tr>
        <tr>
            <td style="width: 35%">
                <p class="mb-0"><u>{{ Str::upper($cover_letter['name']) }}</u></p>
            </td>
            <td style="width: 30%">
                <p class="mb-0"><u>. . . . . . . . . . . . . . . . . .</u></p>
            </td>
            <td style="width: 35%">
                <p class="mb-0"><u>MOKH. BUSTANUL ARIFIN</u></p>
            </td>
        </tr>
    </table>
</body>

</html>
