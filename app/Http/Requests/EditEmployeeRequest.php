<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditEmployeeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name'            => 'required |min:3 |max:120',

            'privileges'      => ['required', function ($attribute, $value, $fail) {
                if($value == 'Admn' || $value == 'User'){
                }else{
                    $fail("Cargo no valido");
                }
            }],

            'salary'          => ['required', function ($attribute, $value, $fail) {
                if ($value > 120 || $value < 27) {
                    $fail("Salario debe estar entre $27 y $120");
                }
            }]
        ];
    }

    public function messages()
    {

        return [
            'name.required' => 'Debe de ingresar un nombre de empleado',
            'name.min' => 'Nombre debe contener por lo menos 3 caracteres',
            'name.max' => 'Nombre debe contener menos de 120 caracteres',
            'salary.required' => 'Debe de ingresar un salario',
        ];
    }
}
