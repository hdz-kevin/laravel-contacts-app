<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'phone_number' => 'required|digits:9',
            'email' => [
                'required',
                'email',
                Rule::unique('contacts', 'email')
                        ->where('user_id', auth()->id())
                        ->ignore($this->route('contact')),
            ],
            'age' => 'required|numeric|gt:0|max:255',
            'profile_picture' => 'image|nullable',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'You already have a contact with this email.',
        ];
    }
}
