<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'details' => ['required'],
                'client' => ['required'],
                'isFulFilled' => ['required']

            ];
        } else {
            return [
                'details' => ['sometimes', 'required'],
                'client' => ['sometimes', 'required'],
                'isFulFilled' => ['sometimes', 'required']
            ];
        }
    }

    protected function prepareForValidation()
    {
        if ($this->isFulFilled != "") {
            $this->merge([
                'is_fulfilled' => $this->isFulFilled
            ]);
        }
    }
}
