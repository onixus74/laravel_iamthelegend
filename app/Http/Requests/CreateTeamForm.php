<?php

namespace IAmLegend\Http\Requests;

use IAmLegend\Http\Requests\Request;
use Auth;

class CreateTeamForm extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:teams,name|min:5',
            'leader' => 'required|exists:users,name'
        ];
    }
}
