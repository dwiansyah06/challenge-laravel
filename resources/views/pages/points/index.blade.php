@extends('template')

@section('title', 'Points')
@section('content')

    <div class="row row-cards">
        
        <div class="col-12">

            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th class="w-1">No.</th>
                                <th>Nasabah</th>
                                <th>Point</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($points as $index => $point)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $point->name }}</td>
                                <td>{{ $point->total_point }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

    <div id="info-page" data-page="points"></div>

@endsection