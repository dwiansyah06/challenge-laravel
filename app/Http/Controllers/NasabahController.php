<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Validator;

use App\Models\Nasabah;
use App\Models\Transaction;
use App\Models\Point;

use App\Http\Requests\NasabahRequest;

class NasabahController extends Controller
{
    public function index()
    {
        $nasabah = Nasabah::all();

        return view('pages.nasabah.index', ['nasabah' => $nasabah]);
    }

    public function create()
    {
        return view('pages.nasabah.form', ['pages' => 'create']);
    }

    public function edit(string $id)
    {
        $nasabah = Nasabah::findOrFail($id);

        return view('pages.nasabah.form', ['nasabah' => $nasabah, 'pages' => 'edit']);
    }

    public function store(NasabahRequest $request): RedirectResponse
    {
        $input = $request->all();

        $validated = $request->validated();

        $nasabah = Nasabah::create($input);
        return redirect('/nasabah')->with('success', 'Nasabah with name '.$input['name'].' has been saved!');
    }

    public function update(NasabahRequest $request, $id): RedirectResponse
    {
        $input = $request->all();

        $validated = $request->validated();

        $nasabah = Nasabah::findOrFail($id);
        $nasabah->update($input);
    
        return redirect('/nasabah')->with('success', 'Nasabah updated');
    }

    public function destroy($id)
    {
        
        Nasabah::where('account_id', $id)->delete();
        Transaction::where('account_id', $id)->delete();
        Point::where('account_id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Nasabah Deleted',
        ]); 
    }

}
