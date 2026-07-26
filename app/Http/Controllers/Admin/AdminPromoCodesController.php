<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Promocode;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminPromoCodesController extends Controller
{
    /** All promocodes view */
    public function index()
    {
        $promocodes = Promocode::get();

        return view('admin.PromoCodes.Index', [
            'promocodes' => $promocodes,
        ]);
    }

    /** Create a promocode
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'promocode_name' => ['required', 'string'],
            'percentage_promo_code' => ['required', 'integer', 'between:1,99'],
        ], [
            'promocode_name.required' => 'Моля, въведете име на промо код.',
            'promocode_name.string' => 'Името на промо кода трябва да бъде текст.',

            'percentage_promo_code.required' => 'Моля, въведете процент отстъпка.',
            'percentage_promo_code.integer' => 'Отстъпката трябва да бъде число.',
            'percentage_promo_code.between' => 'Отстъпката трябва да е между 1 и 99%.',
        ]);

        Promocode::create([
            'promo_code_name' => $validated['promocode_name'],
            'percentage_promo_code' => $validated['percentage_promo_code'],
        ]);

        return back()->with('successCreatePromocode', 'Успешно създадохте промокод!');
    }

    /** Delete a promocode
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request): RedirectResponse
    {
        $promocode = Promocode::where('id', $request->promocodeID)->first();

        if (! $promocode) {
            return back()->with('noSuchPromocode', 'Няма такъв промокод!');
        }

        $promocode->delete();

        return back()->with('successDeletePomocode', 'Промо кодът беше изтрит успешно');
    }

    /**
     * Change promocode status
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function changeStatus(Request $request): JsonResponse
    {
        $promocode = Promocode::where('id', $request->id)->first();

        if (! $promocode) {
            return response()->json([
                'success' => false,
                'message' => 'Няма такъв промокод!',
            ], 404);
        }

        $promocode->update([
            'is_active' => ! $promocode->is_active,
        ]);

        return response()->json([
            'success' => true,
            'is_active' => $promocode->is_active,
        ]);
    }

    /**
     * Check if a promo code is valid
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function check(Request $request): JsonResponse
    {
        $promo = Promocode::where('promo_code_name', $request->promocode_name)->first();

        if (! $promo || ! $promo->is_active) {
            return response()->json([
                'success' => false,
                'message' => 'Промо кодът не е валиден',
            ]);
        }

        return response()->json([
            'success' => true,
            'promo' => [
                'percentage' => $promo->percentage_promo_code,
                'name' => $promo->promo_code_name,
            ],
        ]);
    }
}
