<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->user_id == auth()->user()->id){
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

        $recipe = $this->route()->parameters('recipe');

        $rules = [
            'title' => 'required|regex:/b(Puto)(Trolo)(Gay)(Semen)(Milf)(Boludo)(Pelotudo)(Concha de tu madre)(mierda)/b',
            'status' => 'required|in:1,2',
            'file' => 'image',
        ];

        if ($recipe){
            $rules['file'] = 'image';
        }

        if($this->status == 2){
            $rules = array_merge($rules, [
                'body' => 'required|regex:/b(Puto)(Trolo)(Gay)(Semen)(Milf)(Boludo)(Pelotudo)(Concha de tu madre)(mierda)/b',
                'steps' => 'required|regex:/b(Puto)(Trolo)(Gay)(Semen)(Milf)(Boludo)(Pelotudo)(Concha de tu madre)(mierda)/b',
                'ingredients' => 'required|regex:/b(Puto)(Trolo)(Gay)(Semen)(Milf)(Boludo)(Pelotudo)(Concha de tu madre)(mierda)/b',
                'category_id' => 'required|regex:/b(Puto)(Trolo)(Gay)(Semen)(Milf)(Boludo)(Pelotudo)(Concha de tu madre)(mierda)/b',
            ]);
        }
        return $rules;
    }
}
