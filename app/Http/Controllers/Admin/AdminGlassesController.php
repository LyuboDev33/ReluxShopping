<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Glass;
use App\Models\Admin\GlassValue;
use App\Models\Admin\GlassValueLensIndex;
use App\Models\Admin\VisionType;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminGlassesController extends Controller
{
    /**
     * Show the glasses and lens indexes page.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.Glasses.Index', [
            'glasses'     => Glass::with(['values.lensIndexes', 'category', 'visionType'])->get(),
            'categories'  => Category::whereNull('category_parent_id')->get(),
            'visionTypes' => VisionType::get()
        ]);
    }

    /**
     * Store a new glass type.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeGlass(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'vision_type_id' => ['required', 'exists:vision_types,id'],
            'category_id'    => ['required', 'exists:categories,id'],
            'name'           => ['required', 'string', 'max:255'],
        ], [
            'vision_type_id.required' => 'Моля, изберете тип зрение.',
            'vision_type_id.exists'   => 'Избраният тип зрение не съществува.',

            'category_id.required' => 'Моля, изберете основна категория.',
            'category_id.exists'   => 'Избраната категория не съществува.',

            'name.required' => 'Моля, въведете име на стъклото.',
            'name.string'   => 'Името трябва да бъде текст.',
            'name.max'      => 'Името не може да бъде по-дълго от 255 символа.',
        ]);

        Glass::create([
            'vision_type_id' => $validated['vision_type_id'],
            'category_id'    => $validated['category_id'],
            'name'           => $validated['name'],
        ]);

        return back()->with(
            'success',
            'Типът стъкло беше добавен успешно!'
        );
    }

    /**
     * Store a new glass value.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeGlassValue(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'glass_id' => ['required', 'exists:glasses,id'],
            'value'    => ['required', 'string', 'max:255'],
        ], [
            'glass_id.required' => 'Моля, изберете тип стъкло.',
            'glass_id.exists'   => 'Избраният тип стъкло не съществува.',

            'value.required' => 'Моля, въведете стойност.',
            'value.string'   => 'Стойността трябва да бъде текст.',
            'value.max'      => 'Стойността не може да бъде по-дълга от 255 символа.',
        ]);

        GlassValue::create([
            'glass_id' => $validated['glass_id'],
            'value'    => $validated['value'],
        ]);

        return back()->with('success', 'Стойността беше добавена успешно!');
    }

    /**
     * Update an existing glass value.
     *
     * @param Request $request
     * @param GlassValue $glassValue
     * @return RedirectResponse
     */
    public function updateGlassValue(Request $request, GlassValue $glassValue): RedirectResponse
    {
        $validated = $request->validate([
            'value' => ['required', 'string', 'max:255'],
        ], [
            'value.required' => 'Моля, въведете стойност.',
            'value.string'   => 'Стойността трябва да бъде текст.',
            'value.max'      => 'Стойността не може да бъде по-дълга от 255 символа.',
        ]);

        $glassValue->update([
            'value' => $validated['value'],
        ]);

        return back()->with('success', 'Стойността беше обновена успешно!');
    }

    /**
     * Delete a glass type.
     *
     * @param Glass $glass
     * @return RedirectResponse
     */
    public function destroyGlass(Glass $glass): RedirectResponse
    {
        $glass->delete();

        return back()->with('success', 'Типът стъкло беше изтрит успешно!');
    }

    /**
     * Delete a glass value.
     *
     * @param GlassValue $glassValue
     * @return RedirectResponse
     */
    public function destroyGlassValue(GlassValue $glassValue): RedirectResponse
    {
        $glassValue->delete();

        return back()->with('success', 'Стойността беше изтрита успешно!');
    }

    /**
     * Store a new lens index for a glass value.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeGlassValueLensIndex(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'glass_value_id' => [
                'required',
                'exists:glass_values,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'price' => [
                'required',
                'numeric',
                'min:0',
            ],
        ], [
            'glass_value_id.required' => 'Моля, изберете стойност на стъклото.',
            'glass_value_id.exists'   => 'Избраната стойност на стъклото не съществува.',

            'name.required' => 'Моля, въведете индекс на изтъняване.',
            'name.string'   => 'Индексът трябва да бъде текст.',
            'name.max'      => 'Индексът не може да бъде по-дълъг от 255 символа.',
            'name.unique'   => 'Този индекс вече е добавен към избраната стойност.',

            'price.required' => 'Моля, въведете цена.',
            'price.numeric'  => 'Цената трябва да бъде число.',
            'price.min'      => 'Цената не може да бъде отрицателна.',
        ]);

        GlassValueLensIndex::create([
            'glass_value_id' => $validated['glass_value_id'],
            'name'           => $validated['name'],
            'price'          => $validated['price'],
        ]);

        return back()->with(
            'success',
            'Индексът на изтъняване беше добавен успешно!'
        );
    }


    /**
     * Update an existing lens index for a glass value.
     *
     * @param Request $request
     * @param GlassValueLensIndex $glassValueLensIndex
     * @return RedirectResponse
     */
    public function updateGlassValueLensIndex(Request $request, GlassValueLensIndex $glassValueLensIndex): RedirectResponse
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'price' => [
                'required',
                'numeric',
                'min:0',
            ],
        ], [
            'name.required' => 'Моля, въведете индекс на изтъняване.',
            'name.string'   => 'Индексът трябва да бъде текст.',
            'name.max'      => 'Индексът не може да бъде по-дълъг от 255 символа.',
            'name.unique'   => 'Този индекс вече съществува за стойността.',

            'price.required' => 'Моля, въведете цена.',
            'price.numeric'  => 'Цената трябва да бъде число.',
            'price.min'      => 'Цената не може да бъде отрицателна.',
        ]);

        $glassValueLensIndex->update([
            'name'  => $validated['name'],
            'price' => $validated['price'],
        ]);

        return back()->with(
            'success',
            'Индексът на изтъняване беше обновен успешно!'
        );
    }

    /**
     * Delete a lens index from a glass value.
     *
     * @param GlassValueLensIndex $glassValueLensIndex
     * @return RedirectResponse
     */
    public function destroyGlassValueLensIndex(GlassValueLensIndex $glassValueLensIndex): RedirectResponse
    {
        $glassValueLensIndex->delete();

        return back()->with(
            'success',
            'Индексът на изтъняване беше изтрит успешно!'
        );
    }
}
