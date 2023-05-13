<?php

namespace App\Http\Requests\V1\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
        return [
            'customer_id' => ['required'],
            'details' => ['required'],
            'isFulFilled' => ['required']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'is_fulfilled' => $this->isFulFilled
        ]);
    }
}
