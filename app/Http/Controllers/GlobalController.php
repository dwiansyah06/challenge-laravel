<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Models\Nasabah;
use App\Models\Transaction;
use App\Models\Point;

class GlobalController extends Controller
{
    public function dashboard()
    {
        $data['nasabah'] = Nasabah::get()->count();
        $data['transaction'] = Transaction::get()->count();
        $data['points'] = DB::table('point')
                        ->selectRaw("SUM(point) as total_point")
                        ->get();

        return view('pages.dashboard', $data);
    }
}
