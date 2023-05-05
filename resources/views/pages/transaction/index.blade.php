@extends('template')

@section('title', 'Transaction')
@section('content')

    <div class="row row-cards">
        
        <div class="col-12">
            <a href="{{ route('transaction.create') }}" class="btn btn-primary d-none d-sm-inline-block mb-3">Create Transaction</a>

            @if (session('success'))
            <div class="alert alert-important alert-info alert-dismissible" role="alert">
                <div class="d-flex">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                    </div>
                    <div>
                        {{ session('success') }}
                    </div>
                </div>
                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
            @endif

            <div class="card">
                <div class="table-responsive">
                    <div id="token" data-token="{{ csrf_token() }}"></div>
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th class="w-1">No.</th>
                                <th>Nasabah</th>
                                <th>Transaction Date</th>
                                <th>Description</th>
                                <th>Debit Credit</th>
                                <th>Amount</th>
                                <th class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaction as $index => $row)
                            <tr id="index_{{ $row->id }}">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->transaction_date }}</td>
                                <td>{{ $row->description }}</td>
                                <td>{{ $row->debit_credit_status }}</td>
                                <td>Rp.{{ format_uang($row->amount) }}</td>
                                <td class="d-flex gap-2"> 
                                    <a href="{{ route('transaction.edit', $row->id) }}" class="btn btn-twitter btn-icon" aria-label="Button">
                                        <span class="ti ti-pencil"></span>
                                    </a>
                                    <button class="btn btn-youtube btn-icon del-transaction" data-id="{{ $row->id }}" aria-label="Button">
                                        <span class="ti ti-trash"></span>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

@endsection