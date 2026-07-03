<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Glass;
use App\Models\Admin\GlassValue;
use App\Models\Admin\LensIndex;
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
            'glasses'    => Glass::with('values')->get(),
            'lances'     => LensIndex::get(),
            'categories' => Category::whereNull('category_parent_id')->get()
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
            'category_id' => ['required', 'exists:categories,id'],
            'name'        => ['required', 'string', 'max:255'],
        ], [
            'category_id.required' => 'Моля, изберете основна категория.',
            'category_id.exists'   => 'Избраната категория не съществува.',

            'name.required' => 'Моля, въведете име на стъклото.',
            'name.string'   => 'Името трябва да бъде текст.',
            'name.max'      => 'Името не може да бъде по-дълго от 255 символа.',
        ]);

        Glass::create([
            'category_id' => $validated['category_id'],
            'name'        => $validated['name'],
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
            'price'    => ['required', 'integer', 'min:0'],
        ], [
            'glass_id.required' => 'Моля, изберете тип стъкло.',
            'glass_id.exists'   => 'Избраният тип стъкло не съществува.',

            'value.required' => 'Моля, въведете стойност.',
            'value.string'   => 'Стойността трябва да бъде текст.',
            'value.max'      => 'Стойността не може да бъде по-дълга от 255 символа.',

            'price.required' => 'Моля, въведете цена.',
            'price.integer'  => 'Цената трябва да бъде цяло число.',
            'price.min'      => 'Цената не може да бъде отрицателна.',
        ]);

        GlassValue::create([
            'glass_id' => $validated['glass_id'],
            'value'    => $validated['value'],
            'price'    => $validated['price'],
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
            'price' => ['required', 'integer', 'min:0'],
        ], [
            'value.required' => 'Моля, въведете стойност.',
            'value.string'   => 'Стойността трябва да бъде текст.',
            'value.max'      => 'Стойността не може да бъде по-дълга от 255 символа.',

            'price.required' => 'Моля, въведете цена.',
            'price.integer'  => 'Цената трябва да бъде цяло число.',
            'price.min'      => 'Цената не може да бъде отрицателна.',
        ]);

        $glassValue->update([
            'value' => $validated['value'],
            'price' => $validated['price'],
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
     * Store a new lens index.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeLance(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'  => ['required', 'string', 'max:255', 'unique:lens_indexes,name'],
            'price' => ['required', 'integer', 'min:0'],
        ], [
            'name.required' => 'Моля, въведете име на индекса.',
            'name.string'   => 'Името трябва да бъде текст.',
            'name.max'      => 'Името не може да бъде по-дълго от 255 символа.',
            'name.unique'   => 'Такъв индекс вече съществува.',

            'price.required' => 'Моля, въведете цена.',
            'price.integer'  => 'Цената трябва да бъде цяло число.',
            'price.min'      => 'Цената не може да бъде отрицателна.',
        ]);

        LensIndex::create([
            'name'  => $validated['name'],
            'price' => $validated['price'],
        ]);

        return back()->with('success', 'Индексът на изтъняване беше добавен успешно!');
    }

    /**
     * Update an existing lens index.
     *
     * @param Request $request
     * @param LensIndex $lance
     * @return RedirectResponse
     */
    public function updateLance(Request $request, LensIndex $lance): RedirectResponse
    {
        $validated = $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
        ], [
            'name.required' => 'Моля, въведете име на индекса.',
            'name.string'   => 'Името трябва да бъде текст.',
            'name.max'      => 'Името не може да бъде по-дълго от 255 символа.',

            'price.required' => 'Моля, въведете цена.',
            'price.integer'  => 'Цената трябва да бъде цяло число.',
            'price.min'      => 'Цената не може да бъде отрицателна.',
        ]);

        $lance->update([
            'name'  => $validated['name'],
            'price' => $validated['price'],
        ]);

        return back()->with('success', 'Индексът беше обновен успешно!');
    }

    /**
     * Delete a lens index.
     *
     * @param LensIndex $lance
     * @return RedirectResponse
     */
    public function destroyLance(LensIndex $lance): RedirectResponse
    {
        $lance->delete();

        return back()->with('success', 'Индексът на изтъняване беше изтрит успешно!');
    }
}
