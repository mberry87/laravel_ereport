<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pelnas-{{ time() }}</title>
    <style>
        * {
            font-size: 7pt;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        #data tr td {
            border: 1px solid black;
            padding: 5px;
        }

    </style>
</head>

<body>
<div style="width: 100%; text-align: center;margin-bottom: 4rem;">
    <div style="margin-bottom: 5px;">LAPORAN BULANAN KEGIATAN KUNJUNGAN KAPAL PERUSAHAAN NASIONAL ANGKUTAN LAUT</div>
    <div style="margin-bottom: 5px;">DI PELABUHAN TANJUNG UBAN</div>
    <div style="margin-bottom: 5px;"> {{ strtoupper(auth()->user()->nama_perusahaan) }}</div>
</div>
<table id="data" style="width: 100%; border-collapse: collapse; text-align: center;">
    <tr style="background-color: #e8e5e5;">
        <td rowspan="2">NO</td>
        <td rowspan="2">NAMA KAPAL</td>
        <td rowspan="2">BENDERA</td>
        <td rowspan="2">JENIS KAPAL</td>
        <td colspan="2">DATANG</td>
        <td rowspan="2">JUMLAH BONGKAR</td>
        <td rowspan="2">JENIS BARANG</td>
        <td rowspan="2">NAMA TERMINAL/DERMAGA</td>
        <td colspan="2">BERANGKAT</td>
        <td rowspan="2">JUMLAH MUAT</td>
        <td rowspan="2">JENIS BARANG</td>
        <td rowspan="2">NAMA TERMINAL/DERMAGA</td>
        <td rowspan="2">STATUS TRAYEK</td>
        <td rowspan="2">STATUS KAPAL</td>
    </tr>
    <tr style="background-color: #e8e5e5;">
        <td>TANGGAL</td>
        <td>DARI PELABUHAN</td>
        <td>TANGGAL</td>
        <td>KE PELABUHAN</td>
    </tr>
    @foreach ($data as $d)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $d->nama_kapal }}</td>
            <td>{{ $d->bendera->nama }}</td>
            <td>{{ ($d->jenis_kapal_datang != null) ? $d->jenis_kapal_datang->nama : '' }}</td>
            <td>{{ $d->tgl_datang }}</td>
            <td>{{ ($d->pelabuhan_datang != null) ? $d->pelabuhan_datang->nama : '' }}</td>
            <td>{{ $d->jumlah_bongkar_datang }}</td>
            <td>{{ $d->jenis_muatan_datang }}</td>
            <td>{{ ($d->terminal_datang != null) ? $d->terminal_datang->nama : 'Belum datang' }}</td>
            <td>{{ $d->tgl_berangkat }}</td>
            <td>{{ ($d->pelabuhan_berangkat != null) ? $d->pelabuhan_berangkat->nama : 'Belum berangkat' }}</td>
            <td>{{ ($d->jumlah_muatan_berangkat != null) ? $d->jumlah_muatan_berangkat : 'Belum berangkat' }}</td>
            <td>{{ ($d->jenis_muatan_berangkat != null) ? $d->jenis_muatan_berangkat : 'Belum berangkat' }}</td>
            <td>{{ ($d->terminal_berangkat != null) ? $d->terminal_berangkat->nama : 'Belum berangkat' }}</td>
            <td>{{ ($d->status_trayek_datang != null) ? $d->status_trayek_datang->nama : '' }}</td>
            <td>{{ ($d->status_kapal_datang != null) ? $d->status_kapal_datang->nama : '' }}</td>
        </tr>
    @endforeach
    <tr>
        <td style="border: none !important;"></td>
        <td style="border: none !important;"></td>
        <td style="border: none !important;"></td>
        <td style="border: none !important;"></td>
        <td style="border: none !important;"></td>
        <td style="border: none !important;"></td>
        <td style="border: none !important;">TON/M3/ORANG</td>
        <td style="border: none !important;"></td>
        <td style="border: none !important;"></td>
        <td style="border: none !important;"></td>
        <td style="border: none !important;"></td>
        <td style="border: none !important;">TON/M3/ORANG</td>
        <td style="border: none !important;"></td>
        <td style="border: none !important;"></td>
        <td style="border: none !important;">L/T</td>
        <td style="border: none !important;">C/M/K</td>
    </tr>
</table>
<table style="width: 100%; margin-top: 40px;">
    <tr>
        <td style="width: 80%;"></td>
        <td style="width: 20%;">
            <div style="margin-bottom: 80px;">
                TANJUNG UBAN,
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ date('Y') }}
                <br><br>
                {{ strtoupper(auth()->user()->nama_perusahaan) }}
            </div>
            <div style="text-align: center;">(..................................................)</div>
        </td>
    </tr>
</table>
</body>

</html>
