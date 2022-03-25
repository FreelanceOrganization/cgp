<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UserDetailsRequest extends FormRequest
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
        $route = Route::current();
        $rtn = [
            'firstname' => 'required',
            'lastname'  => 'required',
            'gender'    => 'required',
            'birthdate' => 'required|before:today',
            'nationality' => 'required',
            'contact_number' => 'required|numeric',
            'barangay' => 'required',
            'municipality' => 'required',
            'province' => 'required',
            'email' => 'required|email',
        ];

        if($route->action['as'] == "admin.customer.savings.store" || $route->action['as'] == "admin.customer.newcredits.store"){
            $rtn['password'] = 'required';
            $rtn['email'] = 'required|email|unique:users';
            $rtn['amount'] = 'required';
        }

        if($route->action['as'] == "admin.customer.edit.store"){
            $id = $route->parameters['customer']->id;
            $rtn['email'] = 'required|email|unique:users,email,' . $id;
        }

        return $rtn;
    }
}
