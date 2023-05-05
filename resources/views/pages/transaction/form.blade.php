@extends('template')

@section('title', 'Transaction')
@section('content')

<div class="col-md-12">
  <form class="card" action="{{ $pages === 'create' ? route('transaction.store') : route('transaction.update', $transaction->id) }}" method="post">
    @csrf
    
    @if($pages === 'edit')
      @method('PUT')
    @endif
    
    <div class="card-header">
      <h3 class="card-title">Transaction form</h3>
    </div>
    <div class="card-body">

    @if ($errors->any())
      <div class="alert alert-danger" role="alert">
        <div class="d-flex">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 8l0 4" /><path d="M12 16l.01 0" /></svg>
          </div>
          <div>
            <h4 class="alert-title">I'm so sorry&hellip;</h4>
            <div class="text-muted">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    @endif


    <div class="mb-3">
        <label class="form-label required">Nasabah</label>
        <select class="form-control" name="account_id">
            <option value="">Select Nasabah</option>
            @foreach($nasabah as $row)
              <option value="{{ $row->account_id }}" {{ isset($transaction->account_id) ? $transaction->account_id === $row->account_id ? 'selected' : '' : '' }}>{{ $row->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label required">Transaction Date</label>
        <input type="date" class="form-control" name="transaction_date" value="{{ isset($transaction->transaction_date) ? $transaction->transaction_date : old('transaction_date') }}">
    </div>
    <div class="mb-3">
        <label class="form-label required">Description</label>
        <input class="form-control" name="description" value="{{ isset($transaction->description) ? $transaction->description : old('description') }}" placeholder="Enter Description">
    </div>
    <div class="mb-3">
        <label class="form-label required">Debit Credit</label>
        <select class="form-control" name="debit_credit_status">
            <option value="">Select Debit Or Credit</option>
            @foreach($status as $row)
              <option value="{{ $row['slug'] }}" {{ isset($transaction->debit_credit_status) ? $transaction->debit_credit_status === $row['slug'] ? 'selected' : '' : '' }}>{{ $row['text'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label required">Amount</label>
        <input class="form-control" name="amount" value="{{ isset($transaction->amount) ? $transaction->amount : old('amount') }}" placeholder="Enter Amount">
    </div>

    </div>
    <div class="card-footer text-end">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>

@endsection