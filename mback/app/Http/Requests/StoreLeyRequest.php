<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeyRequest extends FormRequest
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
            'lote_id' => ['required', 'integer'],
            'plomo' => ['required', 'numeric'],
            'plata' => ['required', 'numeric'],
            'zinc' => ['required', 'numeric'],
            'estaño' => ['required', 'numeric'],
            'humedad' => ['required', 'numeric'],
        ];
    }
}
