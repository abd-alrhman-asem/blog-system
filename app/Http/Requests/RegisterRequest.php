<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use App\Traits\apiResponseTrait;
use Symfony\Component\HttpFoundation\Response;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'cell_phone'=> 'min:10|max:10'
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
