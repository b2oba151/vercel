<?php

namespace App\Http\Controllers\Api;

use App\Models\Variation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\VariationResource;
use App\Http\Resources\VariationCollection;
use App\Http\Requests\VariationStoreRequest;
use App\Http\Requests\VariationUpdateRequest;

class VariationController extends Controller
{
    public function index(Request $request): VariationCollection
    {
        $this->authorize('view-any', Variation::class);

        $search = $request->get('search', '');

        $variations = Variation::search($search)
            ->latest()
            ->paginate();

        return new VariationCollection($variations);
    }

    public function store(VariationStoreRequest $request): VariationResource
    {
        $this->authorize('create', Variation::class);

        $validated = $request->validated();

        $variation = Variation::create($validated);

        return new VariationResource($variation);
    }

    public function show(
        Request $request,
        Variation $variation
    ): VariationResource {
        $this->authorize('view', $variation);

        return new VariationResource($variation);
    }

    public function update(
        VariationUpdateRequest $request,
        Variation $variation
    ): VariationResource {
        $this->authorize('update', $variation);

        $validated = $request->validated();

        $variation->update($validated);

        return new VariationResource($variation);
    }

    public function destroy(Request $request, Variation $variation): Response
    {
        $this->authorize('delete', $variation);

        $variation->delete();

        return response()->noContent();
    }
}
