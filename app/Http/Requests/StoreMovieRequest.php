<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'title' => 'required|max:255',
            'overview' => 'required|max:1500',
            'release_date' => 'required|date',
            'director_id' => 'required|numeric',
            'gender_id' => 'required|numeric',
            'classification_id' => 'required|numeric',
        ];
    }
}
