@extends('layouts.admin')

@section('title', 'Dashboard')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ol>
@endsection

@section('content')
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
                    <i class="ion ion-cube"></i>
                </div>
                <a href="{{ route('terminal.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
