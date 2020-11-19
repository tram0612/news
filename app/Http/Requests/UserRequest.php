<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $uri = URL::current();
        if(strpos($uri,'add')!==false){
            return [
                'fullname' => 'required|min:4',
                'username' => 'required|unique:users,username|min:3',
                'password' => 'required|max:20|min:3',
                
            ];
        }
        else{
            $tmp = explode('/', $uri);
            $id = end($tmp);
            return [
               
                'username' => 'required|min:3|unique:users,username,'.$id.',id',
                
                
            ];
        }
    }
    public function messages()
    {
        $uri = URL::current();
        if(strpos($uri,'add')!==false){
            return [
                'fullname.required' => 'Vui lòng nhập họ tên',
                'fullname.min' => 'Vui lòng nhập trên 4 kí tự',
                'username.required' => 'Vui lòng nhập username ',
                'username.unique' => 'Tên username bị trùng.Vui lòng nhập lại!',
                'username.min' => 'Vui lòng nhập trên 3 kí tự',
                'password.required'  => 'A message is required',
                
            ];
        }
        else{
            return [

                'username.required' => 'Vui lòng nhập username ',
                'username.unique' => 'Tên username bị trùng.Vui lòng nhập lại!',
                'username.min' => 'Vui lòng nhập trên 3 kí tự',
                
               
            ];
        }
        
    }
}
