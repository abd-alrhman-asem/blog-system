<?php

namespace App\Http\Requests;

use App\Traits\apiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class LoginRequest extends FormRequest
{
    use apiResponseTrait;
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
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        // to store  the error validation  message
        $allErrors = $validator->errors()->all();
        // to check the json response
        if ($this->expectsJson()) {
            throw new HttpResponseException(
                $this->apiResponse(false ,null , $allErrors , Response::HTTP_UNPROCESSABLE_ENTITY)
            );
        }
        // for other response types (without handling )
        parent::failedValidation($validator);
    }
}
