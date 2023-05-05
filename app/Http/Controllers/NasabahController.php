<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Validator;

use App\Models\Nasabah;

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

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|unique:nasabah,name|regex:/^[\pL\s\-]+$/u'
        ]);

        if($validator->fails()){
            return redirect('/nasabah/create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $product = Nasabah::create($input);
    
        return redirect('/nasabah')->with('success', 'Nasabah with name '.$input['name'].' has been saved!');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|unique:nasabah,name|regex:/^[\pL\s\-]+$/u'
        ]);

        if($validator->fails()){
            return redirect('/nasabah/'.$id.'/edit')
                    ->withErrors($validator)
                    ->withInput();
        }

        $nasabah = Nasabah::findOrFail($id);
        $nasabah->update($input);
    
        return redirect('/nasabah')->with('success', 'Nasabah updated');
    }

    public function destroy($id)
    {
        //delete post by ID
        Nasabah::where('account_id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Nasabah Deleted',
        ]); 
    }

}
