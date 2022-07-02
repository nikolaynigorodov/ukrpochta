<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('web')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'message' => ['required', 'string', 'min:5'],
            'user_id' => ['required', 'exists:users,id'],
            'file' => ['required', 'mimes:pdf,txt,csv', 'max:10240'],
            'answer' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "user_id" => auth("web")->id(),
            "answer" => 0
        ]);
    }
}
