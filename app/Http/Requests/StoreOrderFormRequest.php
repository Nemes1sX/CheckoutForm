<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:3', 'max:30'],
            'last_name' => ['required', 'string', 'min:3', 'max:30'],
            'region' => ['required', 'string', 'min:3', 'max:30'],
            'country' => ['required', 'string', 'min:3', 'max:30'],
            'address' => ['required', 'string', 'min:3', 'max:60'],
            'card_number' => ['required', 'numeric', 'regex:/^\d{16}$/'],
            'cvv' => ['required', 'numeric', 'regex:/^\d{3}$/'],
            'expiry_date' => ['required', 'date_format:Y-m', 'after_or_equal:'.Carbon::now()->format('Y-m')]
        ];
    }
}
