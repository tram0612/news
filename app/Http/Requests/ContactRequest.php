<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\URL;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        $uri=URL::current();
        if(strpos($uri,'add')!==false)
        {
            return [
                'name' => 'required',
                'email' => 'required|email|unique:contact,email',

            ];
        }
        else{
            $tmp=explode('/',$uri);
            $id=end($tmp);
             return [
                'email' => 'required|email|unique:contact,email,'.$id.',contact_id',
             ];
        }
        
    }
    public function messages()
    {
        $uri = URL::current();
        if(strpos($uri,'add')!==false){
            return [
                'name.required' => 'Vui lòng nhập học tên',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Vui lòng nhập email',
                'email.unique' => 'Email bị trùng. Xin nhập lại',

            ];
        }
        else{
             return [
               
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Vui lòng nhập email',
                'email.unique' => 'Email bị trùng. Xin nhập lại',

            ];
        }
        
    }
}
