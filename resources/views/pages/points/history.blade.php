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
                                <th>Description</th>
                                <th>Point</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp

                            @foreach($history as $index => $row)

                            @php $total += $row->point @endphp
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->description }}</td>
                                <td>{{ $row->point }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">Total Point</td>
                                <td class="total-points">{{ $total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

    <div id="info-page" data-page="points"></div>

@endsection