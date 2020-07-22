<?php

namespace App\Http\Controllers;

use App\Feature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Feature $feature
     * @return View
     */
    public function edit(Feature $feature): View
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Feature $feature
     * @return RedirectResponse
     */
    public function update(Request $request, Feature $feature): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Feature $feature
     * @return RedirectResponse
     */
    public function destroy(Feature $feature): RedirectResponse
    {
        //
    }
}
