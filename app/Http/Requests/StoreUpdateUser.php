<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PHPUnit\Framework\Constraint\IsTrue;

class StoreUpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return IsTrue;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(3); //3 campo na url

        return [
            'name' => ['required', 'string','min:3','max:255'],
            'email' => ['required', 'string', 'email','min:3', 'max:255', "unique:users,email,{$id},id"],
            'password' => ['required', 'string','min:6', 'max:16'],
        ];
    }
}
