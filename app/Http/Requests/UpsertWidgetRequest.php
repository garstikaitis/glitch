<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\DTOs\UpsertWidgetDTO;
use Illuminate\Foundation\Http\FormRequest;

final class UpsertWidgetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'domain' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:BUG_TRACKER',
        ];
    }

    public function toDTO(): UpsertWidgetDTO
    {
        $data = $this->validated();

        return new UpsertWidgetDTO($data['name'], $data['domain'], $data['type']);
    }
}
