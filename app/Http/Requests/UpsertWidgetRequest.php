<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\DTOs\WidgetDTO;
use Illuminate\Foundation\Http\FormRequest;

final class UpsertWidgetRequest extends FormRequest
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

    public function toDTO(): WidgetDTO
    {
        $data = $this->validated();

        return new WidgetDTO(name: $data['name'], domain: $data['domain'], uuid: null,type: $data['type']);
    }
}
