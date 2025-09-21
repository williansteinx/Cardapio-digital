<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardapioRequest extends FormRequest
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
        $rules = [
            'nm_prato' => 'required|string|min:3',
            'desc_ingred' => 'required|string|min:3|max:300',
            'vl_prato' => 'required|numeric|min:1|max:1000',
            'arquivo' => 'required|image|mimes:jpg,jpeg,png|max:10240'
        ];

        if ($this->isMethod('POST')) {
            $rules['arquivo'] = 'required|image|mimes:jpg,jpeg,png|max:10240';
        } elseif ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['arquivo'] = 'nullable|image|mimes:jpg,jpeg,png|max:10240';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'nm_prato.required' => "Campo nome é obrigatório",
            'nm_prato.min' => "Campo nome precisa ter no mínimo 3 caracteres",
            'desc_ingred.required' => "Campo de ingredientes é obrigatório",
            'desc_ingred.min' => "Campo de ingredientes precisa ter no mínimo 3 caracteres",
            'desc_ingred.max' => "Campo de ingredientes pode ter no máximo 300 caracteres",
            'vl_prato.required' => "Campo valor é obrigatório",
            'vl_prato.min' => "Valor mínimo é 1,00",
            'vl_prato.max' => "Valor máximo é 1000,00",
            'arquivo.required' => "Campo imagem é obrigatório",
            'arquivo.image' => "Arquivo precisa ser uma imagem",
            'arquivo.mimes' => "Arquivo precisa ter formato: jpg, jpeg ou png",
            'arquivo.max' => "Imagem não pode ter tamanho maior que 10 mb"
        ];
    }
}
