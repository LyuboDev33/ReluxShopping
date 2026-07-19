<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\VisionType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminVisionTypeController extends Controller
{
    /**
     * Store a new vision type.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:vision_types,name'],
        ]);

        VisionType::create([
            'name' => $validated['name'],
        ]);

        return back()->with('success', 'Типът зрение беше добавен успешно!');
    }

    /**
     * Update an existing vision type.
     *
     * @param Request $request
     * @param VisionType $visionType
     * @return RedirectResponse
     */
    public function update(Request $request, VisionType $visionType): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $visionType->update([
            'name' => $validated['name'],
        ]);

        return back()->with('success', 'Типът зрение беше обновен успешно!');
    }

    /**
     * Delete an existing vision type.
     *
     * @param VisionType $visionType
     * @return RedirectResponse
     */
    public function destroy(VisionType $visionType): RedirectResponse
    {
        $visionType->delete();

        return back()->with('success', 'Типът зрение беше изтрит успешно!');
    }
}
