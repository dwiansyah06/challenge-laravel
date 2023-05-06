@extends('template')

@section('title', 'Report')
@section('content')

    <div class="col-md-12">
        <form class="card" action="{{ route('report.store') }}" method="post">
            @csrf
            
            <div class="card-header">
                <h3 class="card-title">Report Form</h3>
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
                        <option value="{{ $row->account_id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label class="form-label required">Start Date</label>
                        <input type="date" class="form-control" name="start_date">
                    </div>
                    <div class="col-6">
                        <label class="form-label required">End Date</label>
                        <input type="date" class="form-control" name="end_date">
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

    <div id="info-page" data-page="report"></div>

@endsection