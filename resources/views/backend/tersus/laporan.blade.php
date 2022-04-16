<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tersus-{{ time() }}</title>
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
            <div style="margin-bottom: 5px;">LAPORAN BULANAN KEGIATAN OPERASIONAL</div>
            <div style="margin-bottom: 5px;">DI TERSUS/TUKS PT .............................</div>
            <div>PELABUHAN TANJUNG UBAN</div>
        </div>
        <table id="data" style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr style="background-color: #e8e5e5;">
                <td rowspan="2">NO</td>
                <td rowspan="2">NAMA KAPAL</td>
                <td rowspan="2">BENDERA</td>
                <td rowspan="2">ISI KOTOR (GT)</td>
                <td colspan="2">DATANG</td>
                <td rowspan="2">JUMLAH BONGKAR (*)</td>
                <td rowspan="2">JENIS MUATAN</td>
                <td rowspan="2">NAMA TERMINAL/DERMAGA</td>
                <td colspan="2">BERANGKAT</td>
                <td rowspan="2">JUMLAH MUAT (*)</td>
                <td rowspan="2">JENIS MUATAN</td>
                <td rowspan="2">NAMA TERMINAL/DERMAGA</td>
            </tr>
            <tr style="background-color: #e8e5e5;">
                <td>TANGGAL</td>
                <td>DARI PELABUHAN</td>
                <td>TANGGAL</td>
                <td>KE PELABUHAN</td>
            </tr>
            @foreach ($data as $tersus)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tersus->nama_kapal }}</td>
                <td>{{ $tersus->bendera->nama }}</td>
                <td>{{ $tersus->isi_kotor }}</td>
                <td>{{ $tersus->tgl_datang }}</td>
                <td>{{ $tersus->pelabuhan_datang->nama }}</td>
                <td>{{ $tersus->jumlah_bongkar_datang }}</td>
                <td>{{ $tersus->jenis_muatan_datang }}</td>
                <td>{{ $tersus->terminal_datang->nama }}</td>
                <td>{{ $tersus->tgl_berangkat }}</td>
                <td>{{ $tersus->pelabuhan_berangkat->nama }}</td>
                <td>{{ $tersus->jumlah_muatan_berangkat }}</td>
                <td>{{ $tersus->jenis_muatan_berangkat }}</td>
                <td>{{ $tersus->terminal_berangkat->nama }}</td>
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
            </tr>
        </table>
        <table style="width: 100%; margin-top: 40px;">
            <tr>
                <td style="width: 80%;"></td>
                <td style="width: 20%;">
                    <div style="margin-bottom: 80px;">
                        TANJUNG UBAN,
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2022
                        <br><br>
                        PT......................
                    </div>
                    <div style="text-align: center;">(..................................................)</div>
                </td>
            </tr>
        </table>
    </body>

</html>
