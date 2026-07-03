<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProductRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:255'],
            'sku'         => ['required', 'string', 'max:255', Rule::unique('products', 'sku')],
            'category_id' => ['required', 'exists:categories,id'],
            'description' => ['required', 'string'],
            'stock'       => ['required', 'integer', 'min:0'],
            'discount'    => ['nullable', 'numeric', 'min:0', 'max:99'],
            'price'       => ['required', 'numeric', 'min:0'],

            'main_image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp'],
            'gallery'    => ['required', 'array'],
            'gallery.*'  => ['image', 'mimes:jpg,jpeg,png,webp'],

            'attribute_values' => ['nullable', 'array'],

            'selected_glass_id'    => ['nullable', 'exists:glasses,id'],
            'glass_values'         => ['nullable', 'array'],
            'glass_values.*.price' => ['nullable', 'numeric', 'min:0'],

            'lens_indexes'           => ['nullable', 'array'],
            'lens_indexes.*.enabled' => ['nullable'],
            'lens_indexes.*.price'   => ['nullable', 'numeric', 'min:0'],
        ];
    }

    /**
     * Get custom validation messages.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Името на продукта е задължително.',

            'sku.required' => 'SKU е задължително.',
            'sku.unique'   => 'Вече съществува продукт със същото SKU.',

            'discount.max' => 'Максималната отстъпка може да бъде 99%',
            'discount.min' => 'Минималната отстъпка трябва да бъде 0%',

            'category_id.required' => 'Моля изберете категория.',
            'category_id.exists'   => 'Избраната категория не съществува.',

            'description.required' => 'Описанието на продукта е задължително.',

            'price.required' => 'Цената е задължителна.',
            'price.numeric'  => 'Цената трябва да бъде число.',
            'price.min'      => 'Цената не може да бъде отрицателна.',

            'main_image.required' => 'Главната снимка е задължителна.',
            'main_image.image'    => 'Файлът трябва да бъде изображение.',
            'main_image.mimes'    => 'Главната снимка трябва да бъде JPG, JPEG, PNG или WEBP.',

            'gallery.required' => 'Моля качете снимки в галерията.',
            'gallery.array'    => 'Галерията е невалидна.',

            'gallery.*.image' => 'Всеки файл в галерията трябва да бъде изображение.',
            'gallery.*.mimes' => 'Снимките в галерията трябва да бъдат JPG, JPEG, PNG или WEBP.',

            'selected_glass_id.exists' => 'Избраният тип стъкло не съществува.',

            'glass_values.array'           => 'Стойностите за стъкла са невалидни.',
            'glass_values.*.price.numeric' => 'Цената за стъкло трябва да бъде число.',
            'glass_values.*.price.min'     => 'Цената за стъкло не може да бъде отрицателна.',

            'lens_indexes.array'           => 'Индексите на изтъняване са невалидни.',
            'lens_indexes.*.price.numeric' => 'Цената за индекс трябва да бъде число.',
            'lens_indexes.*.price.min'     => 'Цената за индекс не може да бъде отрицателна.',
        ];
    }
}
