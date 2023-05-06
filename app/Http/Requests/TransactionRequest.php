<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'account_id' => 'required',
            'transaction_date' => 'required',
            'description' => 'required',
            'debit_credit_status' => 'required',
            'amount' => 'required|min:1000|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'account_id.required' => 'Nasabah is required'
        ];
    }
}
