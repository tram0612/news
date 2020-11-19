<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
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

        if(strpos($uri,'add') !== false){
            return [
                'name' => 'required|unique:story,name',
                'picture' => 'required|mimes:jpeg,jpg,bmp,png',
                'cat' => 'required',
                'preview' => 'required',
                'detail' => 'required',
                'counter' => 'nullable|numeric',
            ];
        }else{

            $tmp=explode('/',$uri);
            $id=end($tmp);
            return [
                'name' => 'required|unique:story,name,'.$id.',story_id',
               
            ];
            
        }
    }
    public function messages()
    {
        $uri = URL::current();
        if(strpos($uri,'add') !== false){
            return [
                'name.required' => 'Vui lòng nhập tên truyện',
                'name.unique' => 'Tên truyện đã bị trùng.Vui lòng nhập lại',
                'picture.required' => 'Vui lòng chọn ảnh',
                'picture.mimes' => 'Vui lòng chọn ảnh',
                'cat.required' => 'Vui lòng chọn danh mục',
                'preview.required' => 'Vui lòng nhập preview',
                'detail.required' => 'Vui lòng nhập chi tiết',
                'counter.numeric' => 'Vui lòng nhập số',
            ];
        }else{
            
            return [
                'name.required' => 'Vui lòng nhập tên truyện',
                'name.unique' => 'Tên truyện đã bị trùng.Vui lòng nhập lại',
               
            ];
            
        }
            
    }
}
