<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Models\Nasabah;
use App\Models\Transaction;

class ReportController extends Controller
{
    public function index()
    {
        $data['nasabah'] = Nasabah::all();

        return view('pages.report.index', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        return redirect('/generate-report?start='.$input['start_date'].'&end='.$input['end_date'].'&id='.$input['account_id']);
    }

    public function generateReport(Request $request)
    {
        
        $data['report'] = Transaction::where('account_id', '=', $request->id)
                ->whereBetween('transaction_date', [$request->start, $request->end])
                ->get();

        return view('pages.report.generate', $data);
    }
}
