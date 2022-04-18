<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Jpt-{{ time() }}</title>
        <style>
            * {
                font-size: 5pt;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
            }

            * {
                margin: 0;
                padding: 0;
            }

            #data {
                padding: 10px;
            }

            #data tr td {
                border: 1px solid black;
                padding: 5px;
            }

        </style>
    </head>

    <body>
        <br>
        <br>
        <div style="width: 100%; text-align: center;margin-bottom: 4rem; padding: 10px;">
            <div style="margin-bottom: 5px;">LAPORAN BULANAN KEGIATAN KUNJUNGAN KAPAL PERUSAHAAN BONGKAR MUAT</div>
            <div style="margin-bottom: 5px;">DI PELABUHAN TANJUNG UBAN</div>
            <div style="margin-bottom: 5px;">PT. ..................................</div>
        </div>
        <table id="data" style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr style="background-color: #e8e5e5;">
                <td rowspan="2">NO</td>
                <td rowspan="2">NAMA KAPAL</td>
                <td rowspan="2">BENDERA</td>
                <td rowspan="2">JENIS KAPAL</td>
                <td colspan="3">UKURAN</td>
                <td colspan="6">BONGKAR</td>
                <td colspan="2">TANGGAL</td>
                <td colspan="2">PERUSAHAAN</td>
                <td rowspan="2">NAMA TERMINAL/DERMAGA (BONGKAR)</td>
                <td colspan="6">MUAT</td>
                <td colspan="2">PERUSAHAAN</td>
                <td rowspan="2">NAMA TERMINAL/DERMAGA (MUAT)</td>
                <td rowspan="2">AGEN</td>
            </tr>
            <tr style="background-color: #e8e5e5;">
                <td>DWT</td>
                <td>GT</td>
                <td>LOA</td>
                <td>SISTEM</td>
                <td>KOMODITI</td>
                <td>JENIS</td>
                <td>TON</td>
                <td>UNIT</td>
                <td>M3</td>
                <td>MULAI</td>
                <td>SELESAI</td>
                <td>PENGIRIM</td>
                <td>PENERIMA</td>
                <td>SISTEM</td>
                <td>KOMODITI</td>
                <td>JENIS</td>
                <td>TON</td>
                <td>UNIT</td>
                <td>M3</td>
                <td>PENGIRIM</td>
                <td>PENERIMA</td>
            </tr>
            @foreach ($data as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->nama_kapal }}</td>
                <td>{{ $d->bendera->nama }}</td>
                <td>{{ $d->jenis_kapal->nama }}</td>
                <td>{{ $d->ukuran_dwt }}</td>
                <td>{{ $d->ukuran_isi_kotor }}</td>
                <td>{{ $d->ukuran_loa }}</td>
                <td>{{ $d->bongkar_sistem }}</td>
                <td>{{ $d->bongkar_komoditi }}</td>
                <td>{{ $d->bongkar_jenis }}</td>
                <td>{{ $d->bongkar_ton }}</td>
                <td>{{ $d->bongkar_unit }}</td>
                <td>{{ $d->bongkar_m3 }}</td>
                <td>{{ $d->tgl_mulai_bongkar }}</td>
                <td>{{ $d->tgl_selesai_bongkar }}</td>
                <td>{{ $d->perusahaan_bongkar_pengirim }}</td>
                <td>{{ $d->perusahaan_bongkar_penerima }}</td>
                <td>{{ ($d->terminal_bongkar != null) ? $d->terminal_bongkar->nama : '' }}</td>
                <td>{{ $d->muat_sistem }}</td>
                <td>{{ $d->muat_komoditi }}</td>
                <td>{{ $d->muat_jenis }}</td>
                <td>{{ $d->muat_ton }}</td>
                <td>{{ $d->muat_unit }}</td>
                <td>{{ $d->muat_m3 }}</td>
                <td>{{ $d->perusahaan_muat_pengirim }}</td>
                <td>{{ $d->perusahaan_muat_penerima }}</td>
                <td>{{ ($d->terminal_muat != null) ? $d->terminal_muat->nama : '' }}</td>
                <td>{{ $d->agen }}</td>
            </tr>
            @endforeach
        </table>
        <table style="width: 100%; margin-top: 40px;">
            <tr>
                <td style="width: 80%;"></td>
                <td style="width: 20%;">
                    <div style="margin-bottom: 80px;">
                        TANJUNG UBAN,
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ date('Y') }}
                        <br><br>
                        PT......................
                    </div>
                    <div style="text-align: center;">(..................................................)</div>
                </td>
            </tr>
        </table>
    </body>

</html>
