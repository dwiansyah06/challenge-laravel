<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Validator;

use App\Models\Nasabah;
use App\Models\Transaction;
use App\Models\Point;

class TransactionController extends Controller
{
    public function index()
    {
        $data['transaction'] =  DB::table('transaction')
                                ->join('nasabah', 'transaction.account_id', '=', 'nasabah.account_id')
                                ->select('transaction.*', 'nasabah.name')
                                ->get();
        return view('pages.transaction.index', $data);
    }

    public function create()
    {
        $data['pages'] = 'create';
        $data['nasabah'] = Nasabah::all();
        $data['status'] = [["text" => 'Debit', 'slug' => 'D'],["text" => 'Credit', 'slug' => 'C']];

        return view('pages.transaction.form', $data);
    }

    public function edit(string $id)
    {
        $data['pages'] = 'edit';
        $data['transaction'] = Transaction::findOrFail($id);
        $data['nasabah'] = Nasabah::all();
        $data['status'] = [["text" => 'Debit', 'slug' => 'D'],["text" => 'Credit', 'slug' => 'C']];

        return view('pages.transaction.form', $data);
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        $point = 0;

        if($input['description'] === 'Bayar Pulsa' || $input['description'] === 'Bayar Listrik') {
            $point = $this->point($input);
        }

        // $validator = Validator::make($input, [
        //     'account_id' => 'required',
        //     'transaction_date' => 'required',
        //     'description' => 'required',
        //     'debit_credit_status' => 'required',
        //     'amount' => 'required|integer'
        // ]);

        // if($validator->fails()){
        //     return redirect('/transaction/create')
        //             ->withErrors($validator)
        //             ->withInput();
        // }

        $transaction = Transaction::create($input);

        if($transaction) {
            Point::create([
                'account_id' => $input['account_id'],
                'transaction_id' => $transaction->id,
                'point' => $point,
            ]);
        }

        return redirect('/transaction')->with('success', 'Transaction has been saved!');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $input = $request->all();
        $point = 0;

        // $validator = Validator::make($input, [
        //     'name' => 'required|unique:nasabah,name|regex:/^[\pL\s\-]+$/u'
        // ]);

        // if($validator->fails()){
        //     return redirect('/nasabah/'.$id.'/edit')
        //             ->withErrors($validator)
        //             ->withInput();
        // }

        $transaction = Transaction::findOrFail($id);
        $transaction->update($input);

        if($transaction->amount != $input['amount']) {
            if($input['description'] === 'Bayar Pulsa' || $input['description'] === 'Bayar Listrik') {
                $point = $this->point($input);

                $pointUpdate = Point::where('transaction_id', $id)->update(['point' => $point]);
            }
        }
        
    
        return redirect('/transaction')->with('success', 'Transaction updated');
    }

    public function destroy($id)
    {
        Transaction::where('id', $id)->delete();
        Point::where('transaction_id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Transaction Deleted',
        ]); 
    }

    public function Point($data)
    {
        $amount = $data['amount'];
        $payment = $this->WhichPayment($data['description']);

        $amount_one = 0;
        $amount_two = 0;
        $point_two = 0;
        $point_three = 0;

        if($amount >= $payment['limit_one']) {
            $point_one = 0;
            $amount_one = $amount - $payment['limit_one'];
        }

        if($amount_one >= $payment['limit_two']) {
            $point_two = ($payment['limit_two']/1000)/$payment['multiple'];
            $amount_two = $amount_one - $payment['limit_two'];
        } else {
            $point_two = ($amount_one/1000)/$payment['multiple'];
        }

        if($amount_two > 0) {
            $point_three = (($amount_two * 2)/1000)/$payment['multiple'];
        }

        $data['point_one'] = $point_one;
        $data['point_two'] = $point_two;
        $data['point_three'] = $point_three;
        $data['point_total'] = $point_one + $point_two + $point_three;

        return $point_one + $point_two + $point_three;
    }

    public function WhichPayment($payment) 
    {
        switch ($payment) {
            case 'Bayar Pulsa':
                $data['limit_one'] = 10000;
                $data['limit_two'] = 20000;
                $data['limit_three'] = 30000;
                $data['multiple'] = 1;
                break;
            case 'Bayar Listrik':
                $data['limit_one'] = 50000;
                $data['limit_two'] = 50000;
                $data['limit_three'] = 100000;
                $data['multiple'] = 2;
                break;
        }

        return $data;
    }


}