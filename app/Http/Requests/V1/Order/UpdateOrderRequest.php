<?php

namespace App\Http\Requests\V1\Order;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        $user = $this->user();
        return $user != NULL && $user->tokenCan('update');
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
                'customerId' => ['required'],
                'details' => ['required'],
                'isFulFilled' => ['required']

            ];
        } else {
            return [
                'customerId' => ['sometimes', 'required'],
                'details' => ['sometimes', 'required'],
                'isFulFilled' => ['sometimes', 'required']
            ];
        }
    }

    protected function prepareForValidation()
    {
        if ($this->isFulFilled != "") {
            $this->merge([
                'customer_id' => $this->customerId,
                'is_fulfilled' => $this->isFulFilled
            ]);
        }
    }
}
