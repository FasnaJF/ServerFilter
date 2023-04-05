<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'capacity' => [
                'sometimes',
                'array',
                'min:2',
                'max:2'
            ],
            'capacity.*' => [
                'sometimes',
                Rule::in([
                    '0',
                    '250GB',
                    '500GB',
                    '1TB',
                    '2TB',
                    '3TB',
                    '4TB',
                    '8TB',
                    '12TB',
                    '24TB',
                    '48TB',
                    '72TB'
                ])
            ],
            'type' => 'sometimes|exists:hard_disks,type',
            'storage.*' => [
                'sometimes',
                Rule::in([
                    '2GB',
                    '4GB',
                    '8GB',
                    '12GB',
                    '16GB',
                    '24GB',
                    '32GB',
                    '48GB',
                    '64GB',
                    '96GB'
                ])
            ],
            'location' => 'sometimes|exists:locations,location',
        ];
    }

    public function messages(): array
    {
        return [
            'capacity' => 'Capacity field should have two entries(for the range)',
            'capacity.*' => 'Choose a capacity from the given values',
            'storage.*' => 'Choose a storage from the given values',
            'location' => 'Choose a location from the list',
            'type' => 'Choose a HDD type from the list',
        ];
    }
}
