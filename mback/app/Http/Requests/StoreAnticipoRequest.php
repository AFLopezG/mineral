<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnticipoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tipo' => ['required', 'string', 'max:255'],
            'lote_id' => ['required', 'integer'],
            'monto' => ['required', 'numeric'],
            'fecha' => ['required', 'date'],
        ];
    }
}
