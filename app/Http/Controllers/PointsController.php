<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Point;

class PointsController extends Controller
{
    public function index()
    {
        $data['points'] = DB::table('point')
        ->selectRaw("SUM(point) as total_point, point.account_id, nasabah.name")
        ->join('nasabah', 'point.account_id', '=', 'nasabah.account_id')
        ->groupBy('point.account_id')
        ->get();

        return view('pages.points.index', $data);
    }
}
