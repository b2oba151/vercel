<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\VariationStoreRequest;
use App\Http\Requests\VariationUpdateRequest;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Variation::class);

        $search = $request->get('search', '');

        $variations = Variation::All();

        return view('app.variations.index', compact('variations', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Variation::class);

        return view('app.variations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VariationStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Variation::class);

        $validated = $request->validated();

        $variation = Variation::create($validated);

        return redirect()
            ->route('variations.edit', $variation)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Variation $variation): View
    {
        $this->authorize('view', $variation);

        return view('app.variations.show', compact('variation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Variation $variation): View
    {
        $this->authorize('update', $variation);

        return view('app.variations.edit', compact('variation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        VariationUpdateRequest $request,
        Variation $variation
    ): RedirectResponse {
        $this->authorize('update', $variation);

        $validated = $request->validated();

        $variation->update($validated);

        return redirect()
            ->route('variations.edit', $variation)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Variation $variation
    ): RedirectResponse {
        $this->authorize('delete', $variation);

        $variation->delete();

        return redirect()
            ->route('variations.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
