<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\DTOs\UserDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

final class UpsertUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ];
    }

    public function toDTO(): UserDTO
    {
        $data = $this->validated();

        return new UserDTO(organizationId: null, name: $data['name'], email: $data['email'], emailVerifiedAt: null, password: $data['password'], rememberToken: null);
    }
}
