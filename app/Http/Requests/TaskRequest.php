<?php

namespace App\Http\Requests;

class TaskRequest extends Request
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
            'name' => 'required|max:50',
            'due_date' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Task\'s name is required',
            'name.max' => 'Task\'s length name must be less or equal then 50 character',
            'due_date.required' => 'Task\'s due date is required'
        ];
    }
}
