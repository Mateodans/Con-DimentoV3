<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->user_id = auth()->user()->id){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'status' => 'required|in:1,2',
        ];

        if($this->status == 2){
            $rules = array_merge($rules, [
                'body' => 'required',
                'steps' => 'required',
                'ingredients' => 'required',
                'categories' => 'required',
            ]);
        }
        return $rules;
    }
}
