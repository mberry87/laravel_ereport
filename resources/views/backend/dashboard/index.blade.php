@extends('layouts.admin')

@section('title', 'Dashboard')

@section('breadcump')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
</ol>
@endsection

@section('content')
@if (auth()->user()->role == 'admin')
<div class="row">
    <div class="col-md-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $users }}</h3>
                <p>User Terdaftar</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('user.index') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $jenis_kapal }}</h3>
                <p>Jenis Kapal</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-boat"></i>
            </div>
            <a href="{{ route('jenis_kapal.index') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $pelabuhan }}</h3>
                <p>Pelabuhan</p>
            </div>
            <div class="icon">
                <i class="ion ion-map"></i>
            </div>
            <a href="{{ route('pelabuhan.index') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $terminal }}</h3>
                <p>Dermaga / Terminal</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-boat"></i>
            </div>
            <a href="{{ route('terminal.index') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Perbandingan data pada Form Data</div>
            <div class="card-body d-flex justify-content-center">
                <div style="width: 70% !important;" class="">
                    <canvas id="formData"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Perbandingan data pada Master Data</div>
            <div class="card-body d-flex justify-content-center">
                <div style="width: 70% !important;" class="">
                    <canvas id="masterData"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card collapsed-card">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                Pemberitahuan terbaru
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: none;">
                <div class="table-reponsive">
                    <table class="table table-sm table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Pemberitahuan</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemberitahuan as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->message }}</td>
                                <td>{{ $data->created_at->format('d M Y, H:i:s') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-md-3 col-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{ $tersus }}</h3>
                <p>TERSUS</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-boat"></i>
            </div>
            <a href="{{ route('tersus.index') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{ $bup }}</h3>
                <p>BUP</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-boat"></i>
            </div>
            <a href="{{ route('bup.index') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{ $keagenanKapal }}</h3>
                <p>Keagenan Kapal</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-boat"></i>
            </div>
            <a href="{{ route('keagenan_kapal.index') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{ $pbm }}</h3>
                <p>PBM</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-boat"></i>
            </div>
            <a href="{{ route('pbm.index') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{ $jpt }}</h3>
                <p>JPT</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-boat"></i>
            </div>
            <a href="{{ route('jpt.index') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{ $pelra }}</h3>
                <p>PELRA</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-boat"></i>
            </div>
            <a href="{{ route('pelra.index') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-bullhorn"></i>
                    Selamat Datang di Sistem Informasi E-Report
                </h3>
            </div>

            <div class="card-body">
                <div class="callout callout-info">
                    <h5>Petunjuk Penggunaan Sistem Informasi</h5>
                    <p>
                        Manual dan petunjuk penggunaan Sistem Informasi E-Report bisa diakses melalui <a
                            href="">disini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@if (auth()->user()->role == 'admin')
@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script>
    const ctx = document.getElementById('formData').getContext('2d');
    const formData = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['TERSUS', 'BUP', 'PELNAS', 'Keagenan Kapal', 'PBM', 'JPT', 'PELRA'],
            datasets: [{
                label: '# Form Data',
                data: [{{ $tersus }}, {{ $bup }}, {{$pelnas}}, {{$keagenanKapal}}, {{$pbm}}, {{$jpt}}, {{$pelra}}, ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 182, 64, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
    });

    const ctx2 = document.getElementById('masterData').getContext('2d');
    const masterData = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['User', 'Bendera', 'Pelabuhan', 'Terminal', 'Jenis Kapal', 'Status Kapal',
                'Status Trayek'
            ],
            datasets: [{
                label: '# Form Data',
                data: [{{$users}}, {{$bendera}}, {{$pelabuhan}}, {{$terminal}}, {{$jenis_kapal}}, {{$statusKapal}}, {{$statusTrayek}} ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 182, 64, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
    });

</script>
@endpush
@endif
