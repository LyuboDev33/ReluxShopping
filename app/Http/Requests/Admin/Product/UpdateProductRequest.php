<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
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
        $product = $this->route('product');

        return [
            'name'        => ['required', 'string', 'max:255'],
            'sku'         => ['required', 'string', 'max:255', Rule::unique('products', 'sku')->ignore($product->id)],
            'category_id' => ['required', 'exists:categories,id'],
            'description' => ['required', 'string'],
            'discount'    => ['nullable', 'numeric', 'min:0', 'max:99'],
            'stock'       => ['required', 'integer', 'min:0'],
            'price'       => ['required', 'numeric', 'min:0'],

            'main_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp'],
            'gallery'    => ['nullable', 'array'],
            'gallery.*'  => ['image', 'mimes:jpg,jpeg,png,webp'],

            'attribute_values' => ['nullable', 'array'],
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

            'main_image.image' => 'Файлът трябва да бъде изображение.',
            'main_image.mimes' => 'Главната снимка трябва да бъде JPG, JPEG, PNG или WEBP.',
            'main_image.max'   => 'Главната снимка не може да бъде по-голяма от 0.5MB.',

            'gallery.array'   => 'Галерията е невалидна.',
            'gallery.*.image' => 'Всеки файл в галерията трябва да бъде изображение.',
            'gallery.*.mimes' => 'Снимките трябва да бъдат JPG, JPEG, PNG или WEBP.',
            'gallery.*.max'   => 'Всяка снимка не може да бъде по-голяма от 0.5MB.',

            'attribute_values.*.exists' => 'Избран атрибут не съществува.',
        ];
    }
}
