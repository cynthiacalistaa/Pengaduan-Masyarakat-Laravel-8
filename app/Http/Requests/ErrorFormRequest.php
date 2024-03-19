<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ErrorFormRequest;

class ErrorFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function true()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'alpha', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]; 
    }

    public function message()
    {
        return [
            'name' => 'Nama tidak boleh berkarakter',
            'email' => 'email sudah terdaftar',
            'password' => 'password minimal 8 karakter'
        ]; 
    }

    public function store(ErrorFormRequest $request){

    }
}
