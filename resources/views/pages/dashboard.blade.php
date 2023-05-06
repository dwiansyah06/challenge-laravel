@extends('template')

@section('title', 'Dashboard')
@section('content')

    <div class="row row-deck row-cards">

        <div class="col-md-4 col-xl-4">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-primary text-white avatar dashboard">
                                <i class="ti ti-users"></i>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                {{ $nasabah }} Nasabah
                            </div>
                            <div class="text-muted">
                                number of nasabah
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-4">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-green text-white avatar dashboard">
                                <i class="ti ti-arrow-bar-to-right"></i>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                {{ $transaction }} Transaction
                            </div>
                            <div class="text-muted">
                                number of transaction
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-4">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-red text-white avatar dashboard">
                                <i class="ti ti-coins"></i>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                {{ $points[0]->total_point }} Point
                            </div>
                            <div class="text-muted">
                                number of points
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="info-page" data-page="home"></div>

@endsection