<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeType;
use App\Models\AttributeValue;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProductAttributesController extends Controller
{
    /** Show all attribute types with their values */
    public function index(): View
    {
        $types = AttributeType::with('values')
            ->orderBy('name')
            ->get();

        return view('admin.ProductAttributes.Index', compact('types'));
    }

    /** Store a new attribute type */
    public function storeType(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:attribute_types,name',
            ],
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        AttributeType::create($validated);

        return back()->with(
            'success',
            'Типът атрибут беше създаден.'
        );
    }

    /** Delete an attribute type */
    public function destroyType(AttributeType $type): RedirectResponse
    {
        $type->delete();

        return back()->with(
            'success',
            'Атрибутът беше изтрит.'
        );
    }

    /** Store a new attribute value
     *
     * @param Request $request
     * @return RedirectResponse
    */
    public function storeValue(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'attribute_type_id' => [
                'required',
                'exists:attribute_types,id',
            ],
            'value' => [
                'required',
                'string',
                'max:255',
                Rule::unique('attribute_values', 'value')->where(
                    fn ($query) => $query->where(
                        'attribute_type_id',
                        $request->attribute_type_id
                    )
                ),
            ],
        ], [
            'value.unique' => 'Тази стойност вече съществува.',
        ]);

        $validated['slug'] = Str::slug($validated['value']);

        AttributeValue::create($validated);

        return back()->with(
            'success',
            'Атрибутът беше създаден.'
        );
    }

    /** Delete an attribute value
     *
     * @param AttributeValue $value
     * @return RedirectResponse
    */
    public function destroyValue(AttributeValue $value): RedirectResponse {
        $value->delete();

        return back()->with(
            'success',
            'Атрибутът беше изтрит.'
        );
    }
}
