<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRip extends FormRequest
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
            //'title' => 'required|max:50|min:5|unique:rips,title,'.$this->rip,
            //'url' => 'required|URL|unique:rips,url,'.$this->rip,
            'title' => 'required|max:50|min:5|unique:rips',
            'url' => 'required|URL|unique:rips',
            'place' => 'required|max:50',
            'enemy' => 'required|max:50',
            'level_of_stupidness' => 'required|numeric|max:10|min:1',
            'players' => 'required'
        ];
    }
}
