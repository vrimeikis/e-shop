<?php

namespace App\Http\Controllers;

use App\Feature;
use App\Http\Requests\FeatureStoreRequest;
use App\Http\Requests\FeatureUpdateRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class FeatureController
 * @package App\Http\Controllers
 */
class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $features = Feature::query()
            ->orderBy('title')
            ->paginate();

        return view('features.list', ['list' => $features]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('features.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FeatureStoreRequest $request
     * @return RedirectResponse
     */
    public function store(FeatureStoreRequest $request): RedirectResponse
    {
        Feature::query()->create($request->getData());

        return redirect()->route('features.index')
            ->with('status', 'Feature created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Feature $feature
     * @return View
     */
    public function edit(Feature $feature): View
    {
        return view('features.form', ['item' => $feature]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FeatureUpdateRequest $request
     * @param Feature $feature
     * @return RedirectResponse
     */
    public function update(FeatureUpdateRequest $request, Feature $feature): RedirectResponse
    {
        $feature->update($request->getData());

        return redirect()->route('features.index')
            ->with('status', 'Feature updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Feature $feature
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Feature $feature): RedirectResponse
    {
        $feature->delete();

        return redirect()->route('features.index')
            ->with('status', 'Feature deleted.');
    }
}
