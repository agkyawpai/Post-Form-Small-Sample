<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostSaveRequest extends FormRequest
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
            'title' => 'required|min:5|unique:posts,title,|max:255',
            'description' => 'required|min:10',
            'file' => 'required|mimes:jpg,png|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'ခေါင်းစဉ် ဖြည့်ပါ။',
            'description.required' => 'အကြောင်းအရာ ဖြည့်ပါ။',
            'title.min' => 'ခေါင်းစဉ် စာလုံး၅လုံးအောက်မဖြစ်ရပါ။',
            'description.min' => 'အကြောင်းအရာ စာလုံး၅လုံးအောက်မဖြစ်ရပါ။',
            'file.required' => 'ဖိုင် ရွေးချယ်ပါ။',
            'file.mimes' => 'JPG နှင့် PNG ဖိုင်သာရွေးချယ်ပါ။',
            'file.max' => 'တင်ထားသော ဖိုင်သည် 2MB အောက်ဖြစ်ရပါမည်။',
            'title.unique' => 'ခေါင်းစဉ် ထပ်နေပါသည်။'
        ];
    }
}
