@extends('template')

@section('title', 'Report')
@section('content')

    <div class="row row-cards">
        
        <div class="col-12">

            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th class="w-1">No.</th>
                                <th>Transaction Date</th>
                                <th>Description</th>
                                <th>Credit</th>
                                <th>Debit</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($report as $index => $row)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $row->transaction_date }}</td>
                                <td>{{ $row->description }}</td>
                                <td>{{ $row->debit_credit_status === 'C' ? 'Rp.'.format_uang($row->amount) : '-' }}</td>
                                <td>{{ $row->debit_credit_status === 'D' ? 'Rp.'.format_uang($row->amount) : '-' }}</td>
                                <td>Rp.{{ format_uang($row->amount) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

@endsection